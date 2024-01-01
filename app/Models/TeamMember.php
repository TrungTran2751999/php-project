<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\User;

class TeamMember extends Model
{
    use HasFactory;
    protected $table = 'team_member';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'description',
        'level',
        'position',
        'teamId',
        'userId',
        'createdAt',
        'updatedAt',
        'createdBy',
        'updatedBy'
    ];
    public function team(){
        return $this->hasMany(Team::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
