<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        $user = User::factory()->create([
            'name' => 'John Doe',
            'username' => 'johndoe'
        ]);

        $cat = Category::factory()->create([
            'name' => 'Hobbies',
            'slug' => 'hobbies-and-stuff'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id,
            'category_id' => $cat->id
        ]);

        Post::factory(5)->create();
    }
}
