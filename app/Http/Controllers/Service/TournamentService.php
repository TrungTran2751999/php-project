<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tournament;

class TournamentService extends Controller
{
    public function getAll(){
        return Tournament::all();
    }
}
