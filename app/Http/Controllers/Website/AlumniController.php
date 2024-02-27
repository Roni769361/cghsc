<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Mpdf\Mpdf;

class AlumniController extends Controller
{
    public function create()
    {
        return view('website.index');
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'occ' => 'required',
            'add' => 'required',
            'batch_no' => 'required',
            'phone' => 'required',
            'trxID' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|', // Assuming photo upload is optional but if provided it must be an image
        ]);

        // Check for duplicate trxID
        $existingTrxID = Alumni::where('trxID', $request->trxID)->exists();
        if ($existingTrxID) {
            return redirect()->back()->with('error', 'Transaction ID already exists. Please use a different one.');
        }
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

        // Insert data into database
        $data_save = Alumni::insert([
            'name' => $request->name,
            'gender' => $request->gender,
            'occ' => $request->occ,
            'add' => $request->add,
            'batch_no' => $request->batch_no,
            'phone' => $request->phone,
            'shirt' => $request->shirt,
            'blood_group' => $request->blood_group,
            'photo' => 'upload/' . $img_name_gen,
            'guest' => $request->guest,
            'guestFee' => $guest_fee,
            'totalFee' => $total_fee,
            'slug' => uniqid('al__'),
            'trxID' => $request->trxID,
            'created_at' => now('Asia/Dhaka'),
        ]);

        // Check if data is saved successfully
        if ($data_save) {
            return redirect()->back()->with('message', 'Registration Successful');
        } else {
            return redirect()->back()->with('error', 'Failed to register. Please try again.');
        }
    }
    public function invitation()
    {
        return view('website.invitation');
    }

    public function search(Request $request)
    {
        $trxID = $request->trxID;

        if (!$trxID) {
            return redirect()->back()->with('error', 'Please enter a valid TrxID');
        }

        $result = Alumni::where('trxID', $trxID)->first();

        if (!$result) {
            return redirect()->back()->with('error', 'Your TrxID is Invalid');
        }

        // Check the status directly from the $result object
        if ($result->status == 1) {
            return view('website.search_results_Verify', compact('result'));
        } elseif ($result->status == 0) {
            return view('website.search_results_Not_Verify', compact('result'));
        } else {
            // Handle other status values if necessary
            // For example, if there are more statuses, you can add more conditions here
            return redirect()->back()->with('error', 'Invalid status');
        }
    }

    public function pdf_inv_gen($slug)
    {
        $result = Alumni::where('slug', $slug)->first();

        // Initialize mPDF with custom configuration
        $config = [
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font' => 'kalpurush',
            'orientation' => 'P', // Portrait mode
            'margin_top' => 30, // 20 mm (0.7 inch)
            'margin_bottom' => 2, // 10 mm (0.4 inch)
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
            // Add more configuration options as needed
        ];

        // Initialize mPDF with custom configuration
        $mpdf = new Mpdf($config);

        // Generate ID card template for alumni in the view
        $html = view('website.pdf_inv', compact('result'))->render();

        // Write HTML content to mPDF
        $mpdf->WriteHTML($html);

        $fileName = $result->trxID . '.pdf';
        // Output PDF with filename
        return response($mpdf->Output($fileName, 'I'), 200, [
            'Content-type' => 'application/pdf',
        ]);
    }
}
