<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Cast foto_ss agar otomatis jadi array saat diakses di Blade
    protected $casts = [
        'foto_ss' => 'array',
    ];
}
