<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		foreach(range(1,20) as $index)
        {
            $user = new \App\User;
            $user->email = 'foo' . $index . '@foo.com';

            $user->save();
        }
	}

}
