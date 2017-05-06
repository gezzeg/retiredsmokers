<?php

use Illuminate\Database\Seeder;

class SmokingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

    	/*DB::table('smoking_statuses')->insert([
            'name' => 'Mula',
        ], 
		[
            'name' => 'Berhenti',
        ],

        [
            'name' => 'Percubaan',
        ],


        );*/

        DB::table('smoking_statuses')->insert(array(
             array('name'=>'Attempt'),
             array('name'=>'Quit'),
             array('name'=>'Withdraw'),
             ));

    }
}
