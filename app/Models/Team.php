<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Team extends Model
{
    use HasFactory;
    protected $table = 'team';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'description',
        'image',
        'categoryId',
        'createdAt',
        'updatedAt',
        'createdBy',
        'updatedBy'
    ];
    public function category(){
        return $this->hasMany(Category::class);
    }
}
