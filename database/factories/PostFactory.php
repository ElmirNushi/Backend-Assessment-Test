<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence(),
            'excerpt' => $this->faker->paragraph(2),
            'image' => 'images/58480e35cef1014c0b5e4920.png',
            'body' => $this->faker->paragraph(6),
        ];
    }
}
