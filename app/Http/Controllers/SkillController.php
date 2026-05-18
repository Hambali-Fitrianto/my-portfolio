<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    /**
     * Display a listing of the skills.
     */
    public function index()
    {
        // Mengambil semua data skill diurutkan berdasarkan kategori kemudian nama
        $skills = Skill::orderBy('kategori', 'asc')->orderBy('nama_skill', 'asc')->get();
        return view('skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new skill.
     */
    public function create()
    {
        return view('skills.create');
    }

    /**
     * Store a newly created skill in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_skill' => 'required|string|max:255',
            'kategori'   => 'required|string|max:255',
            'tingkat'    => 'required|string|max:255',
            'ikon'       => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            Skill::create([
                'nama_skill' => $request->nama_skill,
                'kategori'   => $request->kategori,
                'tingkat'    => $request->tingkat,
                'ikon'       => $request->ikon ?? 'fas fa-laptop-code', // Default ikon jika dikosongkan
            ]);

            DB::commit();
            return redirect()->route('skills.index')->with('success', 'Skill baru berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal menyimpan skill: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified skill.
     */
    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }

    /**
     * Update the specified skill in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'nama_skill' => 'required|string|max:255',
            'kategori'   => 'required|string|max:255',
            'tingkat'    => 'required|string|max:255',
            'ikon'       => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $skill->update([
                'nama_skill' => $request->nama_skill,
                'kategori'   => $request->kategori,
                'tingkat'    => $request->tingkat,
                'ikon'       => $request->ikon ?? 'fas fa-laptop-code',
            ]);

            DB::commit();
            return redirect()->route('skills.index')->with('success', 'Data skill berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal memperbarui skill: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified skill from storage.
     */
    public function destroy(Skill $skill)
    {
        try {
            $skill->delete();
            return redirect()->route('skills.index')->with('success', 'Skill berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus skill: ' . $e->getMessage());
        }
    }
}
