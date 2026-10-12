<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@perpus.test'],
            ['name' => 'Admin Perpustakaan', 'password' => 'admin10']
        );
    }
}
