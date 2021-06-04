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

    public function randN(){
         return "img/avatar/0".rand(1, 3).".jpg"; 
    }

    public function randPost(){
        $post = ["CEO Company", "Comptable", "RH Molengeek"]; 

        return $post[array_rand($post)]; 
    }
    public function definition()
    {
        //$images = ["img/avatar/01.jpg", "img/avatar/02.jpg", "img/avatar/03.jpg"]; 

        

        return [
            "author"        => $this->faker->firstName() . " " . $this->faker->lastName(), 
            "author_image"  => $this->randN(),//'img/def/noav2.png', //'img/def/noav.png', 
            "description"   => $this->faker->text(200), 
            "poste"         => $this->randPost(),
            "disabled"      => 0,
        ];
    }
}
