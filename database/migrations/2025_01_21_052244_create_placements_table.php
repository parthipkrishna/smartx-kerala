<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placements', function (Blueprint $table) {
            $table->increments('placement_id');
            $table->string('company_name')->nullable()->index();
            $table->string('location')->nullable();
            $table->text('address')->nullable();
            $table->string('district')->index();
            $table->text('description')->nullable();
            $table->string('link')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::table('placements', function (Blueprint $table) {
            $table->dropIndex(['company_name']);
            $table->dropIndex(['district']);
        });
        Schema::dropIfExists('placements');
    }
}
