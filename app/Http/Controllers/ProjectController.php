<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\ProjectAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        // Eager loading relasi images dan accounts, diurutkan dari ID terbaru
        $projects = Project::with(['images', 'accounts'])->orderBy('id', 'desc')->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_project' => 'required|string|max:255',
            'tipe_project' => 'nullable|string|max:255',
            'tech_stack'   => 'required|string|max:255',
            'link_project' => 'nullable|url',
            'deskripsi'    => 'required|string',
            'fitur_kunci'  => 'nullable|string',
            'screenshots.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'accounts.*.role_akses' => 'required_with:accounts.*.username|string|max:255',
            'accounts.*.username'   => 'required_with:accounts.*.role_akses|string|max:255',
            'accounts.*.password'   => 'required_with:accounts.*.role_akses|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            // 1. Simpan data utama project
            $project = Project::create([
                'nama_project' => $request->nama_project,
                'tipe_project' => $request->tipe_project,
                'tech_stack'   => $request->tech_stack,
                'link_project' => $request->link_project,
                'deskripsi'    => $request->deskripsi,
                'fitur_kunci'  => $request->fitur_kunci,
            ]);

            // 2. Handle Multiple Screenshots dengan metode bersih basename
            if ($request->hasFile('screenshots')) {
                foreach ($request->file('screenshots') as $file) {
                    if ($file->isValid()) {
                        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                        // Disimpan ke folder storage/app/public/projects
                        $pathFoto = $file->storeAs('projects', $filename, 'public');

                        ProjectImage::create([
                            'project_id'  => $project->id,
                            'path_gambar' => basename($pathFoto), // Menyimpan nama file bersih ke database
                        ]);
                    }
                }
            }

            // 3. Handle Multiple Akun Demo
            if ($request->has('accounts')) {
                foreach ($request->accounts as $account) {
                    if (!empty($account['role_akses']) && !empty($account['username'])) {
                        ProjectAccount::create([
                            'project_id' => $project->id,
                            'role_akses' => $account['role_akses'],
                            'username'   => $account['username'],
                            'password'   => $account['password'],
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('projects.index')->with('success', 'Project dan Kredensial berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function show(Project $project)
    {
        $project->load(['images', 'accounts']);
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $project->load(['images', 'accounts']);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'nama_project' => 'required|string|max:255',
            'tipe_project' => 'nullable|string|max:255',
            'tech_stack'   => 'required|string|max:255',
            'link_project' => 'nullable|url',
            'deskripsi'    => 'required|string',
            'fitur_kunci'  => 'nullable|string',
            'screenshots.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'accounts.*.role_akses' => 'required_with:accounts.*.username|string|max:255',
            'accounts.*.username'   => 'required_with:accounts.*.role_akses|string|max:255',
            'accounts.*.password'   => 'required_with:accounts.*.role_akses|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            // 1. Update data utama
            $project->update([
                'nama_project' => $request->nama_project,
                'tipe_project' => $request->tipe_project,
                'tech_stack'   => $request->tech_stack,
                'link_project' => $request->link_project,
                'deskripsi'    => $request->deskripsi,
                'fitur_kunci'  => $request->fitur_kunci,
            ]);

            // 2. Jika ada upload screenshot baru
            if ($request->hasFile('screenshots')) {
                foreach ($request->file('screenshots') as $file) {
                    if ($file->isValid()) {
                        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $pathFoto = $file->storeAs('projects', $filename, 'public');

                        ProjectImage::create([
                            'project_id'  => $project->id,
                            'path_gambar' => basename($pathFoto),
                        ]);
                    }
                }
            }

            // 3. Update Akun Demo
            ProjectAccount::where('project_id', $project->id)->delete();
            if ($request->has('accounts')) {
                foreach ($request->accounts as $account) {
                    if (!empty($account['role_akses']) && !empty($account['username'])) {
                        ProjectAccount::create([
                            'project_id' => $project->id,
                            'role_akses' => $account['role_akses'],
                            'username'   => $account['username'],
                            'password'   => $account['password'],
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('projects.index')->with('success', 'Project Portofolio berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy(Project $project)
    {
        try {
            // 1. Hapus file fisik gambar menggunakan target disk public eksplisit
            foreach ($project->images as $img) {
                if ($img->path_gambar && Storage::disk('public')->exists('projects/' . $img->path_gambar)) {
                    Storage::disk('public')->delete('projects/' . $img->path_gambar);
                }
            }

            // 2. Hapus data di database
            ProjectImage::where('project_id', $project->id)->delete();
            ProjectAccount::where('project_id', $project->id)->delete();
            $project->delete();

            return back()->with('success', 'Project dan seluruh berkas pendukung berhasil dihapus total.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function destroyImage(ProjectImage $image)
    {
        try {
            if ($image->path_gambar && Storage::disk('public')->exists('projects/' . $image->path_gambar)) {
                Storage::disk('public')->delete('projects/' . $image->path_gambar);
            }
            $image->delete();
            return back()->with('success', 'Screenshot berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus gambar: ' . $e->getMessage());
        }
    }
}
