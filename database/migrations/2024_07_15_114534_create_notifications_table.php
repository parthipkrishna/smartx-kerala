<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('notification_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('shop_id')->nullable();
            $table->string('message'); // Change to 'string' if it's a short message
            $table->text('body'); // Use 'text' for longer bodies
            $table->boolean('status')->default(false);
            $table->enum('type', ['email', 'sms', 'push', 'alert', 'order', 'info'])->default('email');
            $table->json('extra_info')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('user_id');
            $table->index('type');
            $table->index(['user_id', 'status']);
            $table->index('shop_id');

            // Foreign key constraints
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
