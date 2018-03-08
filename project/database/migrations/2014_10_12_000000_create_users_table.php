<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_no');
            $table->string('employee_id')->unique();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('sector_code');
            $table->string('subsector_code');
            $table->string('os_code');
            $table->string('level_code');
            $table->string('region_code');
            $table->string('department');
            $table->string('position');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('user_name')->unique();
            $table->string('password');
            $table->string('image_dir');
            $table->string('status');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
