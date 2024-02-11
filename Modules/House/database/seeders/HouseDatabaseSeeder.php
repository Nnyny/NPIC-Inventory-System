<?php

namespace Modules\House\database\seeders;

use Illuminate\Database\Seeder;
use Modules\House\app\Models\House;


class HouseDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        House::factory()->count(20)->create();
    }
}
