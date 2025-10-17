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
            $table->increments('student_id');
            $table->string('name')->nullable();
            $table->unsignedInteger('course_id')->index();
            $table->string('student_id_no')->index()->unique();
            $table->string('register_no')->index()->unique();
            $table->date('joined_date')->nullable();
            $table->date('dob')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('image', 255)->nullable();
            $table->timestamps();

            // Adding foreign key constraints
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('students', function (Blueprint $table) {
            // Dropping individual indexes
            $table->dropIndex(['course_id']);
            $table->dropUnique(['student_id_no']);
            $table->dropUnique(['register_no']);
        });
        Schema::dropIfExists('students');
    }
}
