<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Faker::create();

        /*
        factory(App\User::class,10)->create([
    		'email' => $faker->unique()->safeEmail,        	
            'first_name' => $faker->name,
            'last_name' => $faker->name,
            'password' => bcrypt('secret'),
		]);
		*/
		
       for($i=1;$i<=10;$i++){
    	
        DB::table('users')->insert([
            'email' => $faker->unique()->safeEmail,        	
            'first_name' => $faker->name,
            'last_name' => $faker->name,
            'password' => bcrypt('secret'),
        ]);  
        
        }
        

         
/*

factory(App\User::class, 50)->create()->each(function ($u) {
        $u->posts()->save(factory(App\Post::class)->make());
    });


        $factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

	    return [
	       	'email' => $faker->unique()->safeEmail,
	        'password' => $password ?: $password = bcrypt('secret'), 
	        'permissions' => $password ?: $password = bcrypt('secret'), 
	        'password' => $password ?: $password = bcrypt('secret'), 
	        'last_login' => $faker->dateTime(),
	        'first_name' => $faker->name,
	        'last_name' => $faker->name,
	        'lat' => $faker->latitude,
	        'lng' => $faker->longitude,
	        'city'=> $faker->city,
	        'country'=> $faker->country,
	        'postcode'=> $faker->postcode,
	        'phone'=> $faker->phoneNumber,
	    ];
	});


    */


    }
}
