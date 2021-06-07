<?php

namespace Database\Seeders;

use App\Models\Article_tag;
use App\Models\Comment;
use App\Models\Pagecontact;
use App\Models\Services;
use App\Models\SubjectContact;
use App\Models\Tag;
use App\Models\Testimontial;
use Database\Factories\ArticleTagFactory;
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
            PageservicesSeeder::class,
            SubjectContactSeeder::class,
            PagecontactSeeder::class,
            CategorieSeeder::class,
            ArticleSeeder::class
        ]);
        
        Services::factory(10)->create();
        Testimontial::factory(10)->create();
        Tag::factory()->count(15)->create(); 
        Article_tag::factory()->count(10)->create(); 
        Comment::factory()->count(5)->create(); 
    }
}
