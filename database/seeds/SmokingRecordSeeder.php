<?php

use Illuminate\Database\Seeder;

class SmokingRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        for($i=1;$i<=3;$i++){
    	
        DB::table('smoking_records')->insert([
            'user_id' => '1',        	
            'smoking_statuses_id' => '1',
            'note' => 'this is note',
            'date' => '2016-12-31',
        ]);  
        
       	}

       	for($i=1;$i<=3;$i++){
    	
        DB::table('smoking_records')->insert([
            'user_id' => '2',        	
            'smoking_statuses_id' => '1',
            'note' => 'this is note',
            'date' => '2016-12-31',
        ]);  
        
       	}
    }
}
