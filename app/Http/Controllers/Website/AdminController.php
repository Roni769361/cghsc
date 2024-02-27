<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf;

class AdminController extends Controller
{

    public function __construct()
    {
        // Exclude role-specific middleware for authentication
        $this->middleware('auth');

        // Apply role-specific middleware only to specific methods, not the entire controller
        $this->middleware('isAdmin')->only(['adminMethod1', 'adminMethod2']);
        $this->middleware('isSub_Admin')->only(['subAdminMethod1', 'subAdminMethod2']);
        $this->middleware('isUser')->only(['userMethod1', 'userMethod2']);
    }


    public function index()
    {
        $Total_Alumni = Alumni::count();
        $Paid = Alumni::where('status', 1)->count();
        $Not_Paid = Alumni::where('status', 0)->count();
        $male = Alumni::where('gender', 'পুরুষ')->count();
        $female = Alumni::where('gender', 'মহিলা')->count();
        $totalGuests = Alumni::whereNotNull('guest')->sum('guest');
        $totalFee_amount = Alumni::whereNotNull('totalFee')->sum('totalFee');
        $total_paid_Amount = Alumni::where('status', 1)->sum('totalFee');
        $total_due_Amount = Alumni::where('status', 0)->sum('totalFee');
        $Batch = Alumni::count('batch_no');
        // Fetch all applicants
        $applicants = Alumni::all();

        // Fetch all unique usernames from the Alumni table
        $usernames = Alumni::pluck('auth')->unique();

        // Fetch dashboard data for each username
        $dashboardData = [];
        foreach ($usernames as $username) {
            $userPaid = Alumni::where('auth', $username)->where('status', 1)->count();
            $userTotalFee = Alumni::where('auth', $username)->where('status', 1)->sum('totalFee');
            $dashboardData[$username] = [
                'username' => $username,
                'paid_count' => $userPaid,
                'total_fee_amount' => $userTotalFee,
            ];
        }

        // Count the number of applicants for each shirt size
        $shirtCounts = $applicants->groupBy('shirt')->map->count();
        // $alumnBatch_wise = $applicants->groupBy('batch_no')->map->count();
        $alumnBatch_wise = $applicants->groupBy('batch_no')->map(function ($batch) {
            $totalFee = $batch->sum('totalFee');
            return [
                'count' => $batch->count(),
                'totalFee' => $totalFee,
            ];
        });

        return view('admin.index', compact('Total_Alumni', 'Paid', 'Not_Paid', 'male', 'female', 'totalGuests', 'totalFee_amount', 'total_paid_Amount', 'total_due_Amount', 'Batch', 'shirtCounts', 'alumnBatch_wise', 'dashboardData'));
    }
    public function alumni_list()
    {
        $totalAmount = Alumni::sum('totalFee');
        // return $totalAmount;
        $all_info = Alumni::all();
        return view('admin.alumni_list', compact('all_info', 'totalAmount'));
    }

    public function payment_verification()
    {
        $all_info = Alumni::all();
        return view('admin.verification', compact('all_info'));
    }
    public function updateVerificationStatus(Request $request, $id)
    {
        // Retrieve the record from the database
        $record = Alumni::findOrFail($id);

        // Update the status based on the submitted value
        $record->status = $request->input('verification_status');

        // Update the auth column with the username of the authenticated user
        $record->auth = auth()->user()->name;
        $record->updated_at = Carbon::now('Asia/Dhaka');


        // Save the changes
        $record->save();

        // Redirect back or to any other route
        return back()->with('message', 'Verification status updated successfully');
    }

    public function edit($slug)
    {
        $single_View = Alumni::where('slug', $slug)->firstOrFail();
        return view('admin.edit', compact('single_View'));
    }
    public function update(Request $request, $slug)
    {
        // return $request->status;
        $img_name_gen = null;

        // Calculate total and guest fees
        $total_fee = $request->guest * 1000 + 1000;
        $guest_fee = $request->guest * 1000;

        // If photo is uploaded, process it
        if ($request->has('photo')) {
            $file = $request->file('photo');
            $img_name_gen = $request->phone . " " . uniqid('alu_') . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('/upload'), $img_name_gen);
        } else {
            $img_name_gen = ''; // Set empty string if photo is not uploaded
        }


        // update data into database
        $data_update = Alumni::where('slug', $slug)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'occ' => $request->occ,
            'add' => $request->add,
            'batch_no' => $request->batch_no,
            'phone' => $request->phone,
            'shirt' => $request->shirt,
            'blood_group' => $request->blood_group,
            'photo' => $img_name_gen ? 'upload/' . $img_name_gen : Alumni::where('slug', $slug)->value('photo'),
            'guest' => $request->guest,
            'guestFee' => $guest_fee,
            'totalFee' => $total_fee,
            // 'slug' => uniqid('al__'),
            'trxID' => $request->trxID,

            'updated_at' => now('Asia/Dhaka'),
        ]);

        // Check if data is saved successfully
        if ($data_update) {
            return redirect('/admin/alumni_list')->with('message', 'Update Successful');
        } else {
            return redirect('/admin/alumni_list')->with('error', 'Failed to register. Please try again.');
        }
    }
    public function batch_search()
    {
        $batch = Alumni::select('batch_no')->distinct()->get();
        return view('admin.batch-search', compact('batch'));
    }
    public function batch_search_in(Request $request)
    {
        // Validate the form data
        $request->validate([
            'batch_no' => 'required|numeric',
        ]);

        // Retrieve students of the specified batch number
        $batchNo = $request->input('batch_no');
        $all_data = Alumni::where('batch_no', $batchNo)->get();

        // Count the number of retrieved alumni
        $total_alu = $all_data->count();

        // Pass the retrieved data and the total count to the view
        return view('admin.batch-search-result', compact('all_data', 'total_alu'));
    }
    public function batch_id_search()
    {
        $batch = Alumni::select('batch_no')->distinct()->get();
        return view('admin.batchwise_id_card', compact('batch'));
    }
    public function batch_id_search_gen(Request $request)
    {
        $batchNo = $request->input('batch_no');
        $alumni = Alumni::where('batch_no', $batchNo)->get();
        // return $all_data;

        // Initialize mPDF with custom configuration
        $config = [
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font' => 'kalpurush',
            'orientation' => 'P', // Portrait mode
            'margin_top' => 2, // 20 mm (0.7 inch)
            'margin_bottom' => 2, // 10 mm (0.4 inch)
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
            // Add more configuration options as needed
        ];

        // Initialize mPDF with custom configuration
        $mpdf = new Mpdf($config);

        // Generate ID card template for alumni in the view
        $html = view('website.pdf_view', compact('alumni'))->render();

        // Write HTML content to mPDF
        $mpdf->WriteHTML($html);

        $filename = $batchNo . ' ' . 'batch_id_card' . '.pdf';

        // Output PDF with filename
        return response($mpdf->Output($filename, 'I'), 200, [
            'Content-type' => 'application/pdf',
        ]);
    }
    public function delete(Request $request)
    {

        $slug = $request->slug;
        $status = $request->status;
        if ($status == 1) {
            return redirect()->back()->with('error', 'Alumni verified, cannot be deleted.');
        } else {

            $delete_al = Alumni::where('slug', $slug)->delete();
            if ($delete_al) {
                return redirect()->back()->with('message', 'Alumni Delete Success!');
            }
        }
    }
    public function trash()
    {
        $all_info = Alumni::onlyTrashed()->get();
        return view('admin.trash', compact('all_info'));
    }
    public function reset($slug)
    {
        $reset = Alumni::where('slug', $slug)->restore();
        if ($reset) {
            return redirect()->back()->with('message', 'Deleted Alumni Restore Success!');
        }
    }


    public function trx_report(Request $request)
    {
        $query = Alumni::query();

        // Check if start date and end date are provided in the request
        if ($request->filled(['start_date', 'end_date'])) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            // Filter records based on the date range
            $query->whereBetween('updated_at', [$startDate, $endDate]);
        }

        // Retrieve the filtered records
        $all_info = $query->where('auth', '!=', 'auth')->get();

        // Calculate the sum of totalFee
        $totalFeeSum = $all_info->sum('totalFee');

        return view('admin.trx-Report', compact('all_info', 'totalFeeSum'));
    }

    public function download_list()
    {
        $all_info = Alumni::all();

        return view('admin.download', compact('all_info'));
    }
    public function user_edit()
    {
        return view('admin.user.edit');
    }
    public function user_update(Request $request, $slug)
    {
        // return $slug;
        $img_name_gen = null;

        if ($request->has('photo')) {
            $file = $request->file('photo');
            $img_name_gen = uniqid('user_img') . time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/user_img'), $img_name_gen);
        }

        $user_up = User::where('slug', $slug)->update([
            'phone' => $request->phone,
            'photo' => $img_name_gen ? 'user_img/' . $img_name_gen : User::where('slug', $slug)->value('photo'),
            'updated_at' => now('Asia/Dhaka'),
        ]);
        if ($user_up) {
            return redirect()->back()->with('message', 'Your Profile Update Successfully!');
        }
    }
}
