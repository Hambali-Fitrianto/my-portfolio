<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display all profiles
     */
    public function index()
    {
        $profiles = Profile::latest()->get();

        return view('profile.index', compact('profiles'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store new profile
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'              => 'required|string|max:255',
            'headline'          => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string',
            'email'             => 'required|email|max:255',
            'no_hp'             => 'required|string|max:20',
            'linkedin_url'      => 'nullable|url',
            'github_url'        => 'nullable|url',
            'foto'              => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cv_file'           => 'nullable|mimes:pdf|max:5120',
        ]);

        DB::beginTransaction();

        try {

            $data = $request->except(['foto', 'cv_file']);

            /**
             * Upload Foto
             */
            if ($request->hasFile('foto')) {

                $foto = $request->file('foto');

                $namaFoto = time() . '_' . Str::slug($request->nama);

                $pathFoto = $foto->storeAs(
                    'profile',
                    $namaFoto . '.' . $foto->getClientOriginalExtension(),
                    'public'
                );

                $data['foto'] = basename($pathFoto);
            }

            /**
             * Upload CV
             */
            if ($request->hasFile('cv_file')) {

                $cv = $request->file('cv_file');

                $namaCv = time() . '_' . Str::slug($request->nama);

                $pathCv = $cv->storeAs(
                    'cv',
                    $namaCv . '.' . $cv->getClientOriginalExtension(),
                    'public'
                );

                $data['cv_file'] = basename($pathCv);
            }

            Profile::create($data);

            DB::commit();

            return redirect()
                ->route('profile.index')
                ->with('success', 'Profile berhasil ditambahkan!');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Show single profile
     */
    public function show(Profile $profile)
    {
        return view('profile.show', compact('profile'));
    }

    /**
     * Show edit form
     */
    public function edit(Profile $profile)
    {
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update profile
     */
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'nama'              => 'required|string|max:255',
            'headline'          => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string',
            'email'             => 'required|email|max:255',
            'no_hp'             => 'required|string|max:20',
            'linkedin_url'      => 'nullable|url',
            'github_url'        => 'nullable|url',
            'foto'              => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cv_file'           => 'nullable|mimes:pdf|max:5120',
        ]);

        DB::beginTransaction();

        try {

            $data = $request->except(['foto', 'cv_file']);

            /**
             * Update Foto
             */
            if ($request->hasFile('foto')) {

                // hapus foto lama
                if (
                    $profile->foto &&
                    Storage::disk('public')->exists('profile/' . $profile->foto)
                ) {

                    Storage::disk('public')->delete('profile/' . $profile->foto);
                }

                $foto = $request->file('foto');

                $namaFoto = time() . '_' . Str::slug($request->nama);

                $pathFoto = $foto->storeAs(
                    'profile',
                    $namaFoto . '.' . $foto->getClientOriginalExtension(),
                    'public'
                );

                $data['foto'] = basename($pathFoto);
            }

            /**
             * Update CV
             */
            if ($request->hasFile('cv_file')) {

                // hapus cv lama
                if (
                    $profile->cv_file &&
                    Storage::disk('public')->exists('cv/' . $profile->cv_file)
                ) {

                    Storage::disk('public')->delete('cv/' . $profile->cv_file);
                }

                $cv = $request->file('cv_file');

                $namaCv = time() . '_' . Str::slug($request->nama);

                $pathCv = $cv->storeAs(
                    'cv',
                    $namaCv . '.' . $cv->getClientOriginalExtension(),
                    'public'
                );

                $data['cv_file'] = basename($pathCv);
            }

            $profile->update($data);

            DB::commit();

            return redirect()
                ->route('profile.index')
                ->with('success', 'Profile berhasil diperbarui!');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Delete profile
     */
    public function destroy(Profile $profile)
    {
        try {

            // hapus foto
            if (
                $profile->foto &&
                Storage::disk('public')->exists('profile/' . $profile->foto)
            ) {

                Storage::disk('public')->delete('profile/' . $profile->foto);
            }

            // hapus cv
            if (
                $profile->cv_file &&
                Storage::disk('public')->exists('cv/' . $profile->cv_file)
            ) {

                Storage::disk('public')->delete('cv/' . $profile->cv_file);
            }

            $profile->delete();

            return redirect()
                ->route('profile.index')
                ->with('success', 'Profile berhasil dihapus!');
        } catch (\Exception $e) {

            return back()
                ->with('error', $e->getMessage());
        }
    }
}
