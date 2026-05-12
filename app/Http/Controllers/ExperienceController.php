<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

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
            'alamat'     => 'required',
            'posisi'     => 'required',
            'periode'    => 'required',
            'deskripsi'  => 'required',
        ]);

        Experience::create($request->all());

        return redirect()->route('experience.index')->with('success', 'Riwayat pengalaman berhasil disimpan!');
    }

    public function show(Experience $experience)
    {
        return view('experience.show', compact('experience'));
    }

    public function edit(Experience $experience)
    {
        return view('experience.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'perusahaan' => 'required',
            'alamat'     => 'required',
            'posisi'     => 'required',
            'periode'    => 'required',
            'deskripsi'  => 'required',
        ]);

        $experience->update($request->all());

        return redirect()->route('experience.index')->with('success', 'Riwayat pengalaman berhasil diupdate!');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return back()->with('success', 'Data pengalaman telah dihapus.');
    }
}
