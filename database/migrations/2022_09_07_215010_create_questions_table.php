<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title', 500);
            $table->string('choice1', 500);
            $table->string('choice2', 500);
            $table->string('choice3', 500);
            $table->string('choice4', 500);
            $table->string('right_answer', 500);
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
        Schema::dropIfExists('questions');
    }
};
