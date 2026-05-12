<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $fillable = [
    //     'nama',
    //     'headline',
    //     'deskripsi_singkat',
    //     'email',
    //     'no_hp',
    //     'linkedin_url',
    //     'github_url',
    //     'foto',
    //     'cv_file'
    // ];
}
