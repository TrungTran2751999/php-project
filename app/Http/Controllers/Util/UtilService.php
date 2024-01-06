<?php

namespace App\Http\Controllers\Util;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
class UtilService extends Controller
{
    public static function upload($file){
        $path = Storage::disk('google')->put("/",$file);
        $id = Storage::disk('google')->getMetadata($path);
        return $id["path"];
    }
    public static function deleteFile($fileName){
        Storage::disk('google')->delete($fileName);
        return response("OK",200);
    }
}
