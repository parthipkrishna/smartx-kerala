<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('course_id');
            $table->unsignedInteger('category_id')->index();
            $table->string('code')->nullable()->index()->unique();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->text('shortdescription')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');

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
            $table->dropForeign(['category_id']);
        });
        Schema::table('courses', function (Blueprint $table) {
            // Dropping individual indexes
            $table->dropIndex(['category_id']);
            $table->dropUnique(['code']);
        });
        Schema::dropIfExists('courses');
    }
}
