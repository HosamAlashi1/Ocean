<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name_en' => 'Ocean Admin',
            'name_ar' => 'Ocean مسسؤول',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
