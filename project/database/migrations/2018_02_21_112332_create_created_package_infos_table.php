<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreatedPackageInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('created_package_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('created_package_id');
            $table->integer('item_no');
            $table->string('item_name');
            $table->string('file_dir');
            $table->string('comments');
            $table->string('status')->default('open');
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
        Schema::dropIfExists('created_package_infos');
    }
}
