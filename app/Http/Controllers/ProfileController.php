<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Menampilkan semua data profile (Index)
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('profile.index', compact('profiles'));
    }

    /**
     * Menampilkan form untuk membuat profile baru (Create)
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Menyimpan data profile baru ke database (Store)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'              => 'required|string|max:255',
            'headline'          => 'required|string|max:255',
            'deskripsi_singkat' => 'required',
            'email'             => 'required|email',
            'no_hp'             => 'required',
            'foto'              => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cv_file'           => 'nullable|mimes:pdf|max:5120',
        ]);

        $data = $request->all();

        // Upload Foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFoto = time() . '_profile.' . $file->getClientOriginalExtension();
            $file->storeAs('public/profile', $namaFoto);
            $data['foto'] = $namaFoto;
        }

        // Upload CV
        if ($request->hasFile('cv_file')) {
            $file = $request->file('cv_file');
            $namaCv = time() . '_cv.' . $file->getClientOriginalExtension();
            $file->storeAs('public/cv', $namaCv);
            $data['cv_file'] = $namaCv;
        }

        Profile::create($data);

        return redirect()->route('profile.index')->with('success', 'Profile berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail satu profile (Show) - Opsional
     */
    public function show(Profile $profile)
    {
        return view('profile.show', compact('profile'));
    }

    /**
     * Menampilkan form edit untuk satu profile (Edit)
     */
    public function edit(Profile $profile)
    {
        return view('profile.edit', compact('profile'));
    }

    /**
     * Memperbarui data profile di database (Update)
     */
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'nama'              => 'required|string|max:255',
            'headline'          => 'required|string|max:255',
            'deskripsi_singkat' => 'required',
            'email'             => 'required|email',
            'no_hp'             => 'required',
            'foto'              => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cv_file'           => 'nullable|mimes:pdf|max:5120',
        ]);

        $data = $request->all();

        // Update Foto
        if ($request->hasFile('foto')) {
            if ($profile->foto) {
                Storage::delete('public/profile/' . $profile->foto);
            }
            $file = $request->file('foto');
            $namaFoto = time() . '_profile.' . $file->getClientOriginalExtension();
            $file->storeAs('public/profile', $namaFoto);
            $data['foto'] = $namaFoto;
        }

        // Update CV
        if ($request->hasFile('cv_file')) {
            if ($profile->cv_file) {
                Storage::delete('public/cv/' . $profile->cv_file);
            }
            $file = $request->file('cv_file');
            $namaCv = time() . '_cv.' . $file->getClientOriginalExtension();
            $file->storeAs('public/cv', $namaCv);
            $data['cv_file'] = $namaCv;
        }

        $profile->update($data);

        return redirect()->route('profile.index')->with('success', 'Profile berhasil diperbarui!');
    }

    /**
     * Menghapus data profile (Delete)
     */
    public function destroy(Profile $profile)
    {
        // Hapus file fisik dari storage agar tidak penuh
        if ($profile->foto) {
            Storage::delete('public/profile/' . $profile->foto);
        }
        if ($profile->cv_file) {
            Storage::delete('public/cv/' . $profile->cv_file);
        }

        $profile->delete();

        return redirect()->route('profile.index')->with('success', 'Profile berhasil dihapus!');
    }
}
