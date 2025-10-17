<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPermissionsTable extends Migration
{
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->increments('permission_id');
            $table->unsignedInteger('role_id');
            $table->string('permission', 255);
            $table->timestamps();

            $table->foreign('role_id')->references('role_id')->on('user_roles')->onDelete('cascade');
            $table->index('role_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_permissions');
    }
}
