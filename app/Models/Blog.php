<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blog";
    public $timestamps = false;
    protected $fillable = [
        'id',
        'content',
        'userId',
        'createdAt',
        'updatedAt',
        'createdBy',
        'updatedBy'
    ];
    public function user(){
        return $this->hasMany(User::class);
    }
}
