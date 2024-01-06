<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ROLE
        $listRole = [
            [
                "id"=>1,
                "name"=>"ADMIN"
            ],
            [
                "id"=>2,
                "name"=>"PARTNER"
            ],
            [
                "id"=>3,
                "name"=>"PLAYER"
            ],
        ];
        for($i=0; $i<count($listRole); $i++){
            $role = new Role();
            $role->id = $listRole[$i]["id"];
            $role->name = $listRole[$i]["name"];
            $role->save();
        }

        $user = new User();
        $user->id = 1;
        $user->name = 'user';
        $user->userName = 'user';
        $user->email = 'user@gmail.com';
        $user->password = Hash::make('123456');
        $user->roleId = 1;
        $user->image = "";
        $user->createdAt = "2023-11-11";
        $user->updatedAt = "2023-11-11";
        $user->createdBy = 1;
        $user->updatedBy = 1;
        $user->save();
    }
}
