<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('student_id')->index();
            $table->unsignedInteger('course_id')->index();
            $table->string('register_no')->index()->unique();
            $table->date('issued_date')->nullable()->index();
            $table->string('institute')->nullable();
            $table->string('theory_mark')->nullable();
            $table->string('practcal_mark')->nullable();
            $table->string('max_mark')->nullable();
            $table->string('total')->nullable();
            $table->string('percentage')->nullable();
            $table->string('grade')->nullable();

            $table->timestamps();

            // Adding foreign key constraints
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mark_lists', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
            $table->dropForeign(['student_id']);
        });
        Schema::table('mark_lists', function (Blueprint $table) {
            // Dropping individual indexes
            $table->dropIndex(['course_id']);
            $table->dropUnique(['register_no']);
            $table->dropIndex(['issued_date']);
            $table->dropIndex(['student_id']);
        });
        Schema::dropIfExists('mark_lists');
    }
}
