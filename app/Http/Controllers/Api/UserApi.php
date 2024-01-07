<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Service\UserService;
use DB;


class UserApi extends Controller
{
    public function getAll(){
        return UserService::getAll();
    }
    public function getById($id, $guid){
        return UserService::getById($id, $guid);
    }
    public function login(Request $request){
        return UserService::login($request);
    } 
    public function logout(){
        return UserService::logout();
    }
}
