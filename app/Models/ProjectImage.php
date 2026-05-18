<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use HasFactory;

    protected $table = 'project_images';
    protected $guarded = [];

    // Relasi balik: Gambar ini milik dari Project tertentu
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
