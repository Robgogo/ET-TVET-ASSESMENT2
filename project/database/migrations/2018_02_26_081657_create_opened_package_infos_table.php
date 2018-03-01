<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpenedPackageInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opened_package_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('open_package_id');
            $table->integer('item_no');
            $table->string('opened_items_dir');
            $table->string('opened_item_comment');
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
        Schema::dropIfExists('opened_package_infos');
    }
}
