<?php

namespace Database\Seeders;

use App\Models\Services;
use App\Models\Testimontial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PosteSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PagehomecarouselSeeder::class,
            PagehomeSeeder::class,
            PageservicesSeeder::class
        ]);
        
        Services::factory(10)->create();
        Testimontial::factory(10)->create();
    }
}
