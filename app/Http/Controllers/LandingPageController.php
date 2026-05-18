<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Project; // PERBAIKAN 1: Import model Project yang baru dibuat

class LandingPageController extends Controller
{
    /**
     * Display the main landing page with complete profile data
     */
    public function index()
    {
        $profile = Profile::first();

        // Urutkan murni berdasarkan ID terbaru dari database
        $experiences = Experience::orderBy('id', 'asc')->get();
        $educations = Education::orderBy('id', 'desc')->get();

        // PERBAIKAN 2: Ambil data project beserta relasi image & account dari database (Urutan terbaru)
        $projects = Project::with(['images', 'accounts'])->orderBy('id', 'desc')->get();

        // PERBAIKAN 3: Daftarkan variabel 'projects' ke dalam compact() agar bisa dibaca di Blade
        return view('landing_page', compact('profile', 'experiences', 'educations', 'projects'));
    }
}
