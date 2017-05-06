<?php

use Illuminate\Database\Seeder;
//use User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

		//factory(App\User::class,10)->create();
       //	$this->call(SmokingStatusSeeder::class);

    	//$this->call(UserSeeder::class);
		//$this->call(ProfilesSeeder::class);
		$this->call(SmokingStatusSeeder::class);
		//$this->call(SmokingRecordSeeder::class);
		$this->call(RoleSeeder::class);



    }
}
