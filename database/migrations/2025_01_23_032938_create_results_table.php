<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('result_id');
            $table->unsignedInteger('course_id')->index();
            $table->string('code')->nullable();
            $table->string('title')->nullable()->index();
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->date('posted_date')->index();
            $table->boolean('status')->default(true);
            $table->string('link');
            $table->timestamps();
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
        Schema::table('results', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
        });
        Schema::table('results', function (Blueprint $table) {
            $table->dropIndex(['course_id']);
            $table->dropIndex(['title']);
            $table->dropIndex(['posted_date']);
        });
        Schema::dropIfExists('results');
    }
}
