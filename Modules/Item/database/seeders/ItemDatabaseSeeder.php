<?php

namespace Modules\Item\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Item\app\Models\Item;

class ItemDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::factory()->count(5)->create();
    }
}
