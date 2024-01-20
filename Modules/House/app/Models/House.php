<?php

namespace Modules\House\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\House\Database\factories\HouseFactory;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

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
    public function scopeFilter(QueryBuilder $query, array $filters)
    {
        $query->allowedFilters([
            AllowedFilter::exact('house_number'),
            AllowedFilter::partial('street'),
            AllowedFilter::partial('country'),
            // Add more filters as needed
        ]);
    }
}
