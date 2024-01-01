<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\Tournament;

class TournamentChiTiet extends Model
{
    use HasFactory;
    protected $table = 'tournament_chitiet';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'teamName',
        'teamId',
        'tournamentId',
        'status',
        'createdAt',
        'updatedAt',
        'createdBy',
        'updatedBy'
    ];
    public function team(){
        return $this->hasMany(Team::class);
    }
    public function tournament(){
        return $this->hasMany(Tournament::class);
    }
}
