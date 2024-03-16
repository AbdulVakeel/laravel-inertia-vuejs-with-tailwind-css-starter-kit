<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		User::factory(1)->create([
			'firstname' => 'Admin',
			'email' => 'admin@test.com',
		]);

		User::factory(1)
			->create([
			'firstname' => 'User',
			'email' => 'user@test.com',
		]);


	}
}
