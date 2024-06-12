<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PeopleFactory>
 */
class PeopleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'sexo' => $this->faker->randomElement(['Masculino', 'Feminino']),
            'idade' => $this->faker->numberBetween(14, 80),
            'altura' => $this->faker->randomFloat(2, 150, 220), // altura entre 150 cm e 250 cm
            'peso' => $this->faker->randomFloat(2, 50.0, 120.0), 
            'cintura' => $this->faker->randomFloat(2, 70.0, 130.0), 
            'quadril' => $this->faker->randomFloat(2, 80.0, 130.0), 
            'pescoco' => $this->faker->randomFloat(2, 30.0, 45.0), 
        ];
    }
}
