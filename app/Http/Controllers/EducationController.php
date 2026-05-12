<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        // Menampilkan data pendidikan terbaru di atas
        $educations = Education::latest()->get();
        return view('education.index', compact('educations'));
    }

    public function create()
    {
        return view('education.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'institusi' => 'required|string|max:255',
            'alamat'     => 'required|string|max:255',
            'gelar'      => 'required|string|max:255',
            'periode'    => 'required|string|max:255',
            'gpa'        => 'nullable|string|max:50',
            'tugas_akhir' => 'nullable|string|max:500',
            'deskripsi'  => 'nullable|string',
        ]);

        Education::create($request->all());

        return redirect()->route('education.index')->with('success', 'Data pendidikan berhasil ditambahkan!');
    }

    public function show(Education $education)
    {
        return view('education.show', compact('education'));
    }

    public function edit(Education $education)
    {
        return view('education.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $request->validate([
            'institusi' => 'required|string|max:255',
            'alamat'     => 'required|string|max:255',
            'gelar'      => 'required|string|max:255',
            'periode'    => 'required|string|max:255',
            'gpa'        => 'nullable|string|max:50',
            'tugas_akhir' => 'nullable|string|max:500',
            'deskripsi'  => 'nullable|string',
        ]);

        $education->update($request->all());

        return redirect()->route('education.index')->with('success', 'Data pendidikan berhasil diperbarui!');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return back()->with('success', 'Data pendidikan telah dihapus.');
    }
}
