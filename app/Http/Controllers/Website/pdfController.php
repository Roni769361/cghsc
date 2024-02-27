<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Mpdf\Mpdf; // Assuming you've installed mPDF via Composer

class pdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('isAdmin')->only(['AccessAdmin, AccessAdmin']);
        $this->middleware('isSub_Admin')->only(['AccessSubAdmin, AccessSubAdmin']);
    }

    public function pdf_gen(Request $request)
    {
        // Fetch all alumni records
        $alumni = Alumni::where('status', 1)->get();

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

        // Output PDF with filename
        return response($mpdf->Output('ID_Card_Paid_Alumni.pdf', 'I'), 200, [
            'Content-type' => 'application/pdf',
        ]);
    }
}
