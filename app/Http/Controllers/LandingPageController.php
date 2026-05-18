<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Experience;
use App\Models\Education;

class LandingPageController extends Controller
{
    public function index()
    {
        $profile = Profile::first();

        // Urutkan murni berdasarkan ID terbaru dari database
        $experiences = Experience::orderBy('id', 'asc')->get();
        $educations = Education::orderBy('id', 'desc')->get();

        return view('landing_page', compact('profile', 'experiences', 'educations'));
    }
}
