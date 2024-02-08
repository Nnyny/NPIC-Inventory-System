<?php

namespace Modules\Stock\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Stock\Database\factories\StockFactory;

class Stock extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): StockFactory
    {
        //return StockFactory::new();
    }
}
