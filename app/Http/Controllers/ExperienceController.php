<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()->get();
        return view('experience.index', compact('experiences'));
    }

    public function create()
    {
        return view('experience.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'perusahaan' => 'required',
            'posisi'     => 'required',
            'periode'    => 'required',
            'deskripsi'  => 'required',
            'foto_ss.*'  => 'image|mimes:jpg,jpeg,png|max:5120', // Validasi tiap file
        ]);

        $data = $request->except('foto_ss');

        // Handle Multiple Uploads
        if ($request->hasFile('foto_ss')) {
            $uploadedFiles = [];
            foreach ($request->file('foto_ss') as $file) {
                $namaFile = time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/experience', $namaFile);
                $uploadedFiles[] = $namaFile;
            }
            $data['foto_ss'] = $uploadedFiles; // Simpan array nama file
        }

        Experience::create($data);

        return redirect()->route('experience.index')->with('success', 'Pengalaman kerja berhasil ditambah!');
    }

    public function edit(Experience $experience)
    {
        return view('experience.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        // ... (Logika mirip store, tapi tambahkan hapus file lama jika perlu) ...
        $data = $request->except('foto_ss');

        if ($request->hasFile('foto_ss')) {
            // Hapus file lama di storage
            if ($experience->foto_ss) {
                foreach ($experience->foto_ss as $oldFile) {
                    Storage::delete('public/experience/' . $oldFile);
                }
            }

            $uploadedFiles = [];
            foreach ($request->file('foto_ss') as $file) {
                $namaFile = time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/experience', $namaFile);
                $uploadedFiles[] = $namaFile;
            }
            $data['foto_ss'] = $uploadedFiles;
        }

        $experience->update($data);
        return redirect()->route('experience.index')->with('success', 'Update berhasil!');
    }

    public function destroy(Experience $experience)
    {
        if ($experience->foto_ss) {
            foreach ($experience->foto_ss as $file) {
                Storage::delete('public/experience/' . $file);
            }
        }
        $experience->delete();
        return back()->with('success', 'Data dihapus!');
    }
}
