<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_details', function (Blueprint $table) {
            $table->increments('course_detail_id');
            $table->unsignedInteger('course_id')->index()->unique();
            // $table->unsignedInteger('batch')->nullable();
            // $table->unsignedInteger('holiday_batch')->nullable();
            $table->text('syllabus');
            // $table->text('career_opportunity')->nullable();
            // $table->text('additional_info')->nullable();
            $table->string('duration');
            $table->string('registration_fee');
            $table->string('practical_exam_fee');
            $table->string('written_exam_fee');
            $table->string('bank_fee')->nullable();
            $table->string('service_fee')->nullable();
            $table->string('total_fee');
            $table->boolean('status')->default(true);
            $table->boolean('featured')->default(true);
            $table->timestamps();

            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade');
            // $table->foreign('batch')->references('batch_id')->on('batches')->onDelete('cascade');
            // $table->foreign('holiday_batch')->references('batch_id')->on('batches')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('course_details', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
            // $table->dropForeign(['batch']);
            // $table->dropForeign(['holiday_batch']);

        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['course_id']);
        });
        Schema::dropIfExists('course_details');
    }
}
