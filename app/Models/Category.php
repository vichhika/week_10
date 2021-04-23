<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = ['category'];

    public function posts()
    {
        return $this->hasMany(Post::class , 'by_category_id');
    }
}
