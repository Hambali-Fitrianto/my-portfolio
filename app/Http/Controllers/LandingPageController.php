<?php

namespace App\Http\Controllers;

use App\Models\Profile;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil data profil yang pertama saja untuk ditampilkan di landing page
        $profile = Profile::first();

        // Kita arahkan ke view landing_page
        return view('landing_page', compact('profile'));
    }
}
