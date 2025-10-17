<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->increments('certificate_id');
            // $table->unsignedInteger('student_id')->index();
            $table->string('register_no')->index();
            $table->string('student_name')->nullable();
            $table->string('duration')->nullable();
            $table->string('performance')->nullable();
            $table->string('course_name')->nullable();
            $table->string('issued_date')->nullable();
            $table->string('institute')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
            
            // // Adding foreign key constraints
            // $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
