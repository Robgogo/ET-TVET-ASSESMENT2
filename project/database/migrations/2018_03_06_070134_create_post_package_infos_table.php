<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostPackageInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_package_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_package_id');
            $table->integer('item_no');
            $table->string('post_items_dir');
            $table->string('post_item_comment');
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
        Schema::dropIfExists('post_package_infos');
    }
}
