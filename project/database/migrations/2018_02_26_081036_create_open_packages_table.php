<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpenPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('open_pack_no');
            $table->string('opened_by');
            $table->integer('created_package_id');
            $table->string('sector_code');
            $table->string('subsector_code');
            $table->string('os_code');
            $table->string('level_code');
            $table->string('region_code');
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
        Schema::dropIfExists('open_packages');
    }
}
