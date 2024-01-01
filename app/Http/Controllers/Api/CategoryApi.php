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
    public function create(Request $request){
        $result = CategoryService::create($request);
        return $result;
    }
    public function upload(Request $request){
        $file = $request->file('file');
        $path = Storage::disk('google')->put("/",$file);
        $id = Storage::disk('google')->getMetadata($path);
        return $id;
    }
    public function delete(Request $request){
        $fileName = $request->input("fileName");
        Storage::disk('google')->delete($fileName);
        return response("OK",200);
    }
    public function youtube(Request $request){
        $config = [
            'key' => env('YOUTUBE_API_KEY'),
        ];
        $video = $request->file("file");
        $youtube = new Youtube($config);

        // Set video details
        $info = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'tags' => $request->input('tags'),
        ];

        // Set privacy status (public, private, unlisted)
        $privacyStatus = 'public';

        // Upload video
        $response = $youtube->upload($video, $info, $privacyStatus);

        // Get uploaded video ID
        $videoId = $response->getVideoId();

        // Do something with the video ID (e.g., save it to your database)

        // Redirect or return response
        return redirect()->back()->with('success', 'Video uploaded successfully!');
    }
}
