<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('names', 150);
            $table->string('lastnames', 200);
            $table->date('brithday');
            $table->string('address', 255);
            $table->string('email', 255)->unique();
            $table->smallInteger('phone');
            $table->integer('status');

            $table->integer('city_id', null, true)->unsigned()->index();

            $table->foreign('id')->references('id')->on('cities')
            ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('students');
    }
}
