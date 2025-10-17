<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuickLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quick_links', function (Blueprint $table) {
            $table->increments('quick_link_id');
            $table->string('title')->nullable()->index();
            $table->string('subtitle')->nullable();
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
        Schema::table('quick_links', function (Blueprint $table) {
            $table->dropIndex(['title']);
        });
        Schema::dropIfExists('quick_links');
    }
}
