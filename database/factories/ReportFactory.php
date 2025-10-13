<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
			'poster' => User::factory(), // 関連ユーザーを自動生成・関連付け
            'title' => fake()->sentence(), // 5語程度のランダムなタイトル
            // 'article' => faker->paragraphs(3, true), // 3段落のランダムな本文
            'article' => fake()->realText(150),
			'importance' => fake()->numberBetween(1, 2),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'), // 過去1年以内のランダムな日時
        ];
    }
}
