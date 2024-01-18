<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'damienvesper1@gmail.com')->firstOrFail();
        $vendor = new Vendor();
        $vendor->banner = 'image/media_65a5f545e1d7e.jpg';
        $vendor->phone = '949788695';
        $vendor->email = 'damienvesper1@gmail.com';
        $vendor->address = 'Lima';
        $vendor->description = 'hola soy damien vesper';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
