<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    // public function run(): void
    // {
    //     User::create([
    //         'name' => 'Hambali Fitrianto',
    //         'email' => 'hambali@fitrianto',
    //         'password' => Hash::make('ibal0000'),
    //     ]);
    // }
    public function run(): void
    {
        // Opsional: Hapus user yang sudah ada agar tidak duplikat saat di-run ulang
        // User::truncate(); 

        User::create([
            'name' => 'Hambali Fitrianto',
            'email' => 'hf@gmail.com', // Saran: gunakan format email yang benar
            'password' => Hash::make('0000ibal'),
        ]);
    }
}
