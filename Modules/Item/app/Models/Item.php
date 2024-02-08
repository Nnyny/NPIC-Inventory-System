<?php

namespace Modules\Item\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Item\Database\factories\ItemFactory;
use Modules\Category\app\Models\Category;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable = [
        'item_code', 'item_img', 'item_name', 'category_id', 'item_qty', 'item_des'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    protected static function newFactory(): ItemFactory
    {
        //return ItemFactory::new();
    }
}
