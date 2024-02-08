<?php

namespace Modules\House\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\House\Database\factories\HouseFactory;

class House extends Model
{
    use HasFactory;
    protected $table = 'houses';
    protected $fillable = [
        'house_num', 'street', 'country'
    ];
    
    protected static function newFactory(): HouseFactory
    {
        //return HouseFactory::new();
    }
}
