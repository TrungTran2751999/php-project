<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use DB;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    public function getAll(){
        $result = $this->userService->getAll();
        if(count($result)==0){
            return response("FUCK",400);
        }
        return response($result);
    }
}
