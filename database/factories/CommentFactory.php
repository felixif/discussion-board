<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentFactory extends Factory
{
    public function definition()
    {
        return [
            'text' => $this->faker->realText(100),
            'user_id' => rand(1, sizeOf(User::get())),
            'post_id' => rand(1, sizeOf(Post::get())),
        ];
    }
}
