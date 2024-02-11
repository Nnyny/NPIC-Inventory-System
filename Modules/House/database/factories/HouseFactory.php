<?php

namespace Modules\House\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\House\app\Models\House;

class HouseFactory extends Factory
{
    protected $model = \Modules\House\app\Models\House::class;

    public function definition(): array
    {
        return [
            'house_num' => $this->faker->randomNumber(3, false),
            'street' => $this->faker->words(2, true),
            'country' => $this->faker->paragraph(1, true),
        ];
    }

}

