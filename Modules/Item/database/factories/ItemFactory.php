<?php

namespace Modules\Item\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Item\app\Models\Item;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Item\app\Models\Item::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'item_code' => $this->faker->numerify('IT-####'),
            'item_img' => $this->faker->image('public/pic', 360, 360, NULL, false, true, NULL, false),
            'item_name' => $this->faker->words(2, true),
            'category_id' => $this->faker->randomElement([1,2,3]),
            'item_qty' => $this->faker->numberBetween(1, 50),
            'item_des' => $this->faker->paragraph(01, true),
        ];

    }
}

