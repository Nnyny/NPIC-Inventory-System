<?php

namespace Modules\Item\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Item\Database\factories\ItemImagesFactory;

class ItemImages extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): ItemImagesFactory
    {
        //return ItemImagesFactory::new();
    }
}
