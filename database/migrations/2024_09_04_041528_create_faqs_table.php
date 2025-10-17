<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_enable');
            $table->string('question');
            $table->text('answer');
            $table->timestamps();

            // Index and foreign key
        });
    }

    public function down()
    {
        Schema::table('faqs', function (Blueprint $table) {
        });
        Schema::dropIfExists('faqs');
    }
}
