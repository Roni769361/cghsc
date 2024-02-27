<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;

class userAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isUser']);
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

        // Count the number of applicants for each shirt size
        $shirtCounts = $applicants->groupBy('shirt')->map->count();
        $alumnBatch_wise = $applicants->groupBy('batch_no')->map->count();

        // return $alumnBatch_wise;
        return view('admin.index', compact('Total_Alumni', 'Paid', 'Not_Paid', 'male', 'female', 'totalGuests', 'totalFee_amount', 'total_paid_Amount', 'total_due_Amount', 'Batch', 'shirtCounts', 'alumnBatch_wise'));
    }
    public function pymentChack()
    {
        $totalAmount = Alumni::sum('totalFee');
        // return $totalAmount;
        $all_info = Alumni::all();
        return view('admin.pyment', compact('all_info', 'totalAmount'));
    }
}
