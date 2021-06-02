<?php

namespace Database\Factories;

use App\Models\Testimontial;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimontialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Testimontial::class;

    //public function 
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "author"        => $this->faker->firstName() . " " . $this->faker->lastName(), 
            "author_image"  => 'img/def/noav2.png', //'img/def/noav.png', 
            "description"   => $this->faker->text(200), 
            "disabled"      => 0,
        ];
    }
}
