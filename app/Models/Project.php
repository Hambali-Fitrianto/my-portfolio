<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Mengizinkan semua field diisi secara mass-assignment
    protected $guarded = [];

    // Relasi: Satu Project memiliki BANYAK gambar screenshot
    public function images()
    {
        return $this->hasMany(ProjectImage::class, 'project_id', 'id');
    }

    // Relasi: Satu Project memiliki BANYAK akun demo (Admin, User, Mekanik, dst)
    public function accounts()
    {
        return $this->hasMany(ProjectAccount::class, 'project_id', 'id');
    }
}
