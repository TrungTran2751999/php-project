<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->id = 1;
        $user->name = 'user';
        $user->userName = 'user';
        $user->email = 'user@gmail.com';
        $user->password = Hash::make('123456');
        $user->role = "admin";
        $user->image = "hhhh";
        $user->createdAt = "2023-11-11";
        $user->updatedAt = "2023-11-11";
        $user->createdBy = 1;
        $user->updatedBy = 1;
        $user->save();
    }
}
