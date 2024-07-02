<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->sentence(8,true),
            'description'=>$this->faker->sentences(4,true),
             'surface'=>$this->faker->numberBetween(20,400),
            'rooms'=>$this->faker->numberBetween(1,9),
             'bedrooms'=>$this->faker->numberBetween(1,9),
             'floor'=>$this->faker->numberBetween(0,30),
             'price'=>$this->faker->numberBetween(100000,1000000),
             'city'=>$this->faker->city,
             'address'=>$this->faker->address,
             'postal_code'=>$this->faker->postcode,
             'sold'=>false
        ];

    }
}
