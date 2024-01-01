<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Tournament extends Model
{
    use HasFactory;
    protected $table = 'tournament';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'teamCount',
        'categoryId',
        'ngayToChuc',
        'status',
        'createdAt',
        'updatedAt',
        'createdBy',
        'updatedBy'
    ];
    public function category(){
        return $this->hasMany(Category::class);
    }
}
