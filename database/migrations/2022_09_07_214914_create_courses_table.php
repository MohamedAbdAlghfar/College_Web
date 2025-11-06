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
        Schema::create('courses', function (Blueprint $table) {
            $table->id()->unsigned(); 
            $table->timestamps();
            $table->string('name');
            $table->string('link');
            $table->integer('point')->default(2);
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->integer('level')->default(1); 
            $table->integer('enrollment_status')->default(0); // 0 => not available to enroll , 1 => available to enroll           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['deleted_by']);
        });
        Schema::dropIfExists('courses');
    }
};
