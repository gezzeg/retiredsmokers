<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProfilesSeeder extends Seeder
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

       for($i=1;$i<=10;$i++){
        
       DB::table('profiles')->insert([
            'user_id' => $i,        	
            'dob' => $faker->date(),
            'smoked' => (bool)random_int(0, 1),
           	'lat' => $faker->latitude,
	        'lng' => $faker->longitude,
	        'city'=> $faker->city,
	        'country'=> $faker->country,
	        'postcode'=> $faker->postcode,
	        'phone'=> $faker->phoneNumber,
        ]);  

   }

    }
}
