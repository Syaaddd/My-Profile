<?php

namespace App\Http\Controllers;

use App\Services\PortfolioParser;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $parser = new PortfolioParser(public_path('isisimpleportofolio.md'));
        $portfolio = $parser->getData();
        
        return view('home', compact('portfolio'));
    }

    public function downloadCV()
    {
        $cvPath = storage_path('app/public/cv/cv.pdf');
        
        if (file_exists($cvPath)) {
            return response()->download($cvPath, 'cv.pdf');
        }
        
        return redirect()->back()->with('error', 'CV file not found.');
    }
}