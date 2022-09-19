<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
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
            'username' => 'johndoe',
            'password' => 'test'
        ]);

        $user2 = User::factory()->create([
            'name' => 'Python Doe',
            'username' => 'pythondoe'
        ]);

        $cat = Category::factory()->create([
            'name' => 'Hobbies',
            'slug' => 'hobbies-and-stuff'
        ]);

        $cat2 = Category::factory()->create([
            'name' => 'Personal',
            'slug' => 'personal-sluggish-slug'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id,
            'category_id' => $cat->id
        ]);

        Post::factory(1)->create([
            'user_id' => $user->id,
            'category_id' => $cat2->id
        ]);

        Comment::factory(10)->create([
            'user_id' => $user->id,
            'post_id' => 1,
        ]);

        Post::factory(1)->create([
            'user_id' => $user2->id,
            'category_id' => $cat2->id
        ]);

        Post::factory(3)->create([
            'user_id' => $user2->id
        ]);

        Post::factory(10)->create();
    }
}
