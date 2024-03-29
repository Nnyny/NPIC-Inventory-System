<?php

namespace Modules\Category\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Database\factories\CategoryFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'cat_name', 'cat_des'
    ];
    
    protected static function newFactory(): CategoryFactory
    {
        //return CategoryFactory::new();
    }
}
