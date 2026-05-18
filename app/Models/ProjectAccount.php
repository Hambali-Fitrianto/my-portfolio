<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAccount extends Model
{
    use HasFactory;

    protected $table = 'project_accounts';
    protected $guarded = [];

    // Relasi balik: Akun demo ini milik dari Project tertentu
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
