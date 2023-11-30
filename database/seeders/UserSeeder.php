<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\password;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Damien Vesper',
                'username' => 'Lord Vesper Admin',
                'email' => 'damienvesper1@gmail.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('damien'),
            ],
            [
                'name' => 'Henry Sanger',
                'username' => 'Hasanger Vendor',
                'email' => 'hasanger1@gmail.com',
                'role' => 'vendor',
                'status' => 'active',
                'password' => bcrypt('hasanger'),
            ],
            [
                'name' => 'Peyton User',
                'username' => 'Peyton User',
                'email' => 'peyton8888@gmail.com',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('peyton'),
            ]
        ]);
    }
}
