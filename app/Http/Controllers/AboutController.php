<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __contract(){

    }
    public function index(){
        return view('about');
    }
    public function categories($id){
        return "catepgries".$id;
    }
}
