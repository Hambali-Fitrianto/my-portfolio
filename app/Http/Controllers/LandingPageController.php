<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Project;
use App\Models\Skill; // PERBAIKAN 1: Import model Skill yang baru kita buat

class LandingPageController extends Controller
{
    /**
     * Display the main landing page with complete profile data
     */
    public function index()
    {
        $profile = Profile::first();

        // Urutkan murni berdasarkan ID terbaru dari database
        $experiences = Experience::orderBy('id', 'desc')->get();
        $educations = Education::orderBy('id', 'desc')->get();

        // Ambil data project beserta relasi image & account dari database
        $projects = Project::with(['images', 'accounts'])->orderBy('id', 'desc')->get();

        // PERBAIKAN 2: Ambil semua data skill dari database, urutkan berdasarkan kategori
        $skills = Skill::orderBy('kategori', 'asc')->orderBy('nama_skill', 'asc')->get();

        // PERBAIKAN 3: Daftarkan variabel 'skills' ke dalam compact() agar bisa dibaca di Blade
        return view('landing_page', compact('profile', 'experiences', 'educations', 'projects', 'skills'));
    }
}
