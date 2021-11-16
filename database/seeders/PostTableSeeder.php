<?php

namespace Database\Seeders;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Post;
        $p->title = "My first post";
        $p->text = "This post will get a lot of hate from you.";
        $p->user_id = 1;
        $p->save();

        $posts = Post::factory()->count(10)->create();
    }
}
