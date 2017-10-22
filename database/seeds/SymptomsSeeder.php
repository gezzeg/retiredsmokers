<?php

use Illuminate\Database\Seeder;

class SymptomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('symptoms')->insert(array(
             array('name'=>'cravings for nicotine','description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book'),
             array('name'=>'shortened of breath','description'=>''),
             array('name'=>'fastened heart beat','description'=>''),
             array('name'=>'hyper sensitive','description'=>''),
             array('name'=>'tempered','description'=>''),  
             array('name'=>'headaches','description'=>''),
             array('name'=>'dizziness','description'=>''),           
             array('name'=>'anxiety','description'=>''),
             array('name'=>'depression','description'=>''),
             array('name'=>'chest pain','description'=>''),
             array('name'=>'gastric','description'=>''),
             array('name'=>'insomnia','description'=>''),
             array('name'=>'difficulty concentrating','description'=>''),
             array('name'=>'lost appetite','description'=>''),
             array('name'=>'weight gain','description'=>''),
             array('name'=>'weight lost','description'=>''),
             array('name'=>'vision problem','description'=>''),
             array('name'=>'lost in creativity','description'=>''),
             array('name'=>'increase in creativity','description'=>''),           
             array('name'=>'negative thinking','description'=>''),
             array('name'=>'sweating','description'=>''),
             ));
    }
}
