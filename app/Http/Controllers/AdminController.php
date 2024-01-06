<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("admin/index");
    }
    //Tournament
    public function tournamentChuaDuyet(){
        return view("admin/tournament/tournamentChuaDuyet");
    }
    public function tournamentDaDuyet(){
        return view("admin/tournament/tournamentDaDuyet");
    }
    //Category
    public function category(){
        return view("admin/category/index");
    }
    public function createCategory(){
        return view("admin/category/createCategory");
    }
    public function updateCategory(){
        return view("admin/category/updateCategory");
    }
    //Organizer
    public function organizer(){
        return view("admin/organizer/index");
    }
    public function createOrganizer(){
        return view("admin/organizer/createOrganizer");
    }
    public function updateOrganizer(){
        return view("admin/organizer/updateOrganizer");
    }
}
