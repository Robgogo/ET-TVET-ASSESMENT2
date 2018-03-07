<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('app_pack_no');
            $table->integer('post_package_id');
            $table->string('approved_by');
            $table->string('sector_code');
            $table->string('subsector_code');
            $table->string('os_code');
            $table->string('level_code');
            $table->string('region_code');
            $table->string('approval_status');
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
        Schema::dropIfExists('approves');
    }
}
