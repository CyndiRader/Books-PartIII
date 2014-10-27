<?php

class UsersTableSeeder extends Seeder {
	public function run() {
		DB::table('users')->delete();

		DB::table('users')->insert(array(
			array('id'=>1, 'username' => 'admin', 'password' => Hash::make('pass'),
				'is_admin' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime),
			array('id'=>2, 'username' => 'cyndi', 'password' => Hash::make('word'),
				'is_admin' => false,'created_at' => new DateTime, 'updated_at' => new DateTime)
		));
	}
}

?>