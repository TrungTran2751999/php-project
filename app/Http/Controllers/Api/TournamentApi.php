<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Service\TournamentService;

class TournamentApi extends Controller
{
    public function getAll(){
        return TournamentService::getAll();
    }
}
