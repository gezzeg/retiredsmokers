<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
             //Added field
            $table->integer('user_id');
            $table->date('dob')->nullable();
            $table->boolean('smoked')->nullable();
            $table->tinyInteger('sex'); // 0-unknown 1-male 2-female 9-Not Applicable
            $table->boolean('withdrawalSymtoms')->nullable();            
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 10, 7)->nullable();
           // $table->string('longitude')->nullable();
          //  $table->string('latitude')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('postcode')->nullable();
            $table->string('phone')->nullable();
            $table->string('avatar')->default('default.jpg');
                       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
