<?php
namespace Database\Factories;


use App\Models\Services;
use App\Providers\IconServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

 class ServicesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Services::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() 
    {
        return [
            "titre"         => $this->faker->catchPhrase(),
            "description"   => $this->faker->text(200),  
            "disabled"      => 0,
            "icone"         => IconServiceProvider::fontAwesomeIcon()
        ];
    }
}
