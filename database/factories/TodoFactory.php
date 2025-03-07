<?php

namespace Database\Factories;

use App\Models\Todo;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    // The model that this factory is associated with
    protected $model = Todo::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence, // Generates a random title
            'description' => $this->faker->text, // Generates a random description
        ];
    }
}
