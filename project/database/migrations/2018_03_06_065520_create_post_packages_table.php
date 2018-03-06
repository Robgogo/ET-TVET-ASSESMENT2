<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_pack_no');
            $table->integer('opened_package_id');
            $table->string('created_by');
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
        Schema::dropIfExists('post_packages');
    }
}
