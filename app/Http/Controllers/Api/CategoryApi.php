<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Google\Auth\Credentials\UserRefreshCredentials;
use App\Http\Controllers\Service\CategoryService;
use Google\Client as GoogleClient;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;
use Storage;
use Madcoda\Youtube\Youtube;

class CategoryApi extends Controller
{
    public function getAll(){
        return CategoryService::getAll();
    }
    public function getById($id){
        return CategoryService::getById($id);
    }
    public function create(Request $request){
        $result = CategoryService::create($request);
        return $result;
    }
    public function update(Request $request){
        $result = CategoryService::update($request);
        return $result;
    }
}
