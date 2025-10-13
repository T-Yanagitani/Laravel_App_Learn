<?php

namespace Database\Seeders;

use Database\Factories\ReportFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Report;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
		// ユーザーを50人作成し、それぞれのユーザーに3つの投稿記事を関連付けて作成
		User::factory()
			->count(15)
			->create();

		// 投稿記事をさらに100件、既存のユーザーにランダムに関連付けて作成
		Report::factory()
			->count(50)
			->create();
    }
}
