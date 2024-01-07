<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class UserService extends Controller
{
    public static function getAll(){
        $user = User::select("id","guid","userName","name","email","roleId","image")
                    ->orderByDesc("updatedAt")
                    ->get();
        return response($user,200);
    }

    public static function getById($id, $guid){
        $user = User::select("id","guid","userName","name","email","roleId","image")
                    ->where("id",$id)
                    ->first();
        if(!$user || $user->guid!=$guid) return response("User không tồn tại",400);
        return response($user,200);
    }

    public static function login($request){
        $userName = $request->input("userName");
        $password = $request->input("password");
        $user = User::where("userName",$userName)
                    ->first();
        
        if(!$user || !Hash::check($password,$user->password)) return response("Tên đăng nhập hoặc mật khẩu không tồn tại",400);
        $arrUser = [
            "id"=>$user->id,
            "userName"=>$userName,
            "password"=>$password,
        ];
        $token = JWTAuth::attempt($arrUser);
        
        $response = new Response();
        $response->cookie("token",$token, 3600*24*365);
        $response->cookie("name",$userName, 3600*24*365);
        $response->cookie("id",$user->id, 3600*24*365);
        return $response;
    }

    public static function logout(){
        Cookie::forget('token');
        Cookie::forget('name');
        Cookie::forget('id');

        $response = new Response();
        $response->withCookie(Cookie::forget('token'));
        $response->withCookie(Cookie::forget('name'));
        $response->withCookie(Cookie::forget('id'));
        return $response;
    }

}
