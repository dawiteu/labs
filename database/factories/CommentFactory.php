<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "auteur"        => $this->faker->name(),
            "auteur_email"  => $this->faker->email,
            "message"       => $this->faker->text(50),
            "valide"        => $this->faker->numberBetween(0, 1), // les factory passent;  
            "deleted"       => $this->faker->numberBetween(0, 1), 
            "article_id"    => $this->faker->numberBetween(1, 5)
        ];
    }
}
