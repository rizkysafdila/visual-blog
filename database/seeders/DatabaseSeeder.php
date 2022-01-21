<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        User::create([
            'name' => 'Muhammad Rizky',
            'username' => 'rizkysafdila',
            'email' => 'rizkysafdila@gmail.com',
            'password' => bcrypt('12345')
        ]);
        
        // User::create([
        //     'name' => 'Zulfati Amelia',
        //     'email' => 'zulfatifani@gmail.com',
        //     'password' => bcrypt('4321')
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);
        
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        Post::factory(20)->create();
    }
}
