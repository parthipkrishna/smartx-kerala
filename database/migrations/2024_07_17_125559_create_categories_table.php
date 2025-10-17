<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('category_id'); // Auto-incrementing unsigned big integer primary key
            $table->string('name'); // Name of the category
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // Image for the category
            $table->string('link')->nullable();
            $table->timestamps(); // Timestamps for record creation and update

            // Indexes
            $table->index('name'); // Index on category_name
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex(['name']);
        });
        Schema::dropIfExists('categories');
    }
}
