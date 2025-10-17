<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDistrictPanchayathToContactInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('contact_infos', function (Blueprint $table) {
        $table->string('district')->after('message');
        $table->string('panchayath')->after('district');
    });
}

public function down()
{
    Schema::table('contact_infos', function (Blueprint $table) {
        $table->dropColumn(['district', 'panchayath']);
    });
}

}
