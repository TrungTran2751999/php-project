<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Google\Auth\Credentials\UserRefreshCredentials;
use App\Http\Controllers\Service\OrganizerService;
use Google\Client as GoogleClient;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;
use Storage;
use Madcoda\Youtube\Youtube;

class OrganizerApi extends Controller
{
    public function getAll(){
        return OrganizerService::getAll();
    }
    public function getById($id){
        return OrganizerService::getById($id);
    }
    public function create(Request $request){
        $result = OrganizerService::create($request);
        return $result;
    }
    public function update(Request $request){
        $result = OrganizerService::update($request);
        return $result;
    }
}
