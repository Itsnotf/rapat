<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Super Admin',
            'id_bidang' => 2,
            'NoHandphone' => '0823082382',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'role' => 'superadmin',
            'username' => 'superadmin',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'id_bidang' => 2,
            'NoHandphone' => '0823082382',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'role' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('password'),
        ]);

        // User::factory(19)->create();
    }
}
