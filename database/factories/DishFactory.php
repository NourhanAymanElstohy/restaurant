<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            'name' => $name,
            'description' => $this->faker->text(),
            'duration' => $this->faker->numberBetween(0, 180),
            'image' => null,
            // 'image' => 'dishes/' . preg_replace("/[(\.)(\s)]/", "", $name),
        ];
    }
}
