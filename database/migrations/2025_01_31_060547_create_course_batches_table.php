<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_batches', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('course_id')->index();  
            $table->unsignedInteger('batch_id')->index()->nullable();   
            $table->unsignedInteger('holiday_batch_id')->index()->nullable();    
            $table->timestamps();
    
            // Define foreign key relationships
            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade');
            $table->foreign('batch_id')->references('batch_id')->on('batches')->onDelete('cascade');
            $table->foreign('holiday_batch_id')->references('batch_id')->on('batches')->onDelete('cascade');
        });
    }
        
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_batches', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
            $table->dropForeign(['batch_id']);
            $table->dropForeign(['holiday_batch_id']);
        });
        Schema::table('course_batches', function (Blueprint $table) {
            $table->dropIndex(['course_id']);
            $table->dropIndex(['batch_id']);
            $table->dropIndex(['holiday_batch_id']);

        });
        Schema::dropIfExists('course_batches');
    }
}
