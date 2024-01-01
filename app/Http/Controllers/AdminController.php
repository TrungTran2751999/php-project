<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("admin/index");
    }
    public function tournamentChuaDuyet(){
        return view("admin/tournamentChuaDuyet");
    }
    public function tournamentDaDuyet(){
        return view("admin/tournamentDaDuyet");
    }
}
