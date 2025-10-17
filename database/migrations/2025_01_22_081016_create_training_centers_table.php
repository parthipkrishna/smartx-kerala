<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_centers', function (Blueprint $table) {
            $table->id();
            $table->string('center_name')->index();
            $table->text('address')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('course')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->string('district')->index();
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
        Schema::table('training_centers', function (Blueprint $table) {
            $table->dropIndex(['center_name']);
            $table->dropIndex(['district']);
        });
        Schema::dropIfExists('training_centers');
    }
}
