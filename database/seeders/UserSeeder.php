<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh user admin
        DB::table('users')->insert([
            'email' => 'rafi@example.com',
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang lebih aman
            'remember_token' => Str::random(10),
            'role' => 'customer', // Jika Anda memiliki kolom role
            'email_verified_at' => now(), // Jika Anda ingin emailnya sudah terverifikasi
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Contoh user customer 1
        DB::table('users')->insert([
            'email' => 'customer1@example.com',
            'password' => Hash::make('secret'), // Ganti 'secret' dengan password yang lebih aman
            'remember_token' => Str::random(10),
            'role' => 'customer', // Jika Anda memiliki kolom role
            'email_verified_at' => now(), // Jika Anda ingin emailnya sudah terverifikasi
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Contoh user customer 2
        DB::table('users')->insert([
            'email' => 'customer2@example.com',
            'password' => Hash::make('secure123'), // Ganti 'secure123' dengan password yang lebih aman
            'remember_token' => Str::random(10),
            'role' => 'customer', // Jika Anda memiliki kolom role
            'email_verified_at' => now(), // Jika Anda ingin emailnya sudah terverifikasi
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Anda bisa menambahkan lebih banyak data user di sini sesuai kebutuhan
    }
}