<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id(); // Primary key for the feature
            $table->string('name', 255); // Name of the feature (e.g., store_app)
            $table->text('description')->nullable(); // Description of the feature
            $table->timestamps(); // created_at and updated_at timestamps

            // Indexes for better performance
            $table->index('name'); // Index for faster lookups on the feature name
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('features', function (Blueprint $table) {
            // Dropping the index on 'name'
            $table->dropIndex(['name']);
        });
        Schema::dropIfExists('features');
    }
}
