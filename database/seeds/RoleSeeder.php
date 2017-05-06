<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert(array(
             array('slug'=>'member','name'=>'member'),
             array('slug'=>'admin','name'=>'admin'),
             ));

    }
}
