<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id'); 
            $table->string('name', 255);
            $table->string('phone_number', 20)->index(); 
            $table->string('email', 255)->index()->unique(); 
            $table->string('password', 255)->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->unsignedInteger('user_role')->nullable()->index();
            $table->string('profile_image')->nullable(); 
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('user_role')->references('role_id')->on('user_roles')->onDelete('set null');
        });

        // Composite index for combined searching performance
        Schema::table('users', function (Blueprint $table) {
            $table->index(['email', 'phone_number']);
        });
    }

    public function down()
    {
        // Dropping foreign key constraints
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['user_role']);
        });

        Schema::table('users', function (Blueprint $table) {
            //Dropping composite index
            $table->dropIndex(['email', 'phone_number']);

            // Dropping individual indexes
            $table->dropUnique(['email']);
            $table->dropIndex(['phone_number']);
            $table->dropIndex(['user_role']);
        });
        Schema::dropIfExists('users');
    }
}