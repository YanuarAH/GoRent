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
        // 1. Tambahkan user ke tabel users dan ambil ID-nya
        $userId = DB::table('users')->insertGetId([
            'email' => 'rafi@example.com',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => 'customer',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Tambahkan data customer dan hubungkan dengan user ID
        DB::table('customers')->insert([
            'user_id' => $userId, // Menghubungkan customer dengan user menggunakan user_id
            'name' => 'Rafi Ahmad',
            'nik' => '1234567890123456',
            'phone' => '081234567890',
            'address' => 'Jl. Merdeka No. 1',
            'gender' => 'male',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. Tambahkan user ke tabel users dan ambil ID-nya untuk customer 1
        $userId2 = DB::table('users')->insertGetId([
            'email' => 'customer1@example.com',
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10),
            'role' => 'customer',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 4. Tambahkan data customer dan hubungkan dengan user ID 2
        DB::table('customers')->insert([
            'user_id' => $userId2,
            'name' => 'Customer Satu',
            'nik' => '9876543210987654',
            'phone' => '089876543210',
            'address' => 'Jl. Merdeka No. 2',
            'gender' => 'female',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 5. Tambahkan user ke tabel users dan ambil ID-nya untuk customer 2
        $userId3 = DB::table('users')->insertGetId([
            'email' => 'customer2@example.com',
            'password' => Hash::make('secure123'),
            'remember_token' => Str::random(10),
            'role' => 'customer',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 6. Tambahkan data customer dan hubungkan dengan user ID 3
        DB::table('customers')->insert([
            'user_id' => $userId3,
            'name' => 'Customer Dua',
            'nik' => '1122334455667788',
            'phone' => '087654321098',
            'address' => 'Jl. Merdeka No. 3',
            'gender' => 'female',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
