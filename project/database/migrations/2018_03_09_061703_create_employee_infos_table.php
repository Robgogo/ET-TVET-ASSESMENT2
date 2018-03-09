<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_id')->unique();
            $table->integer('transaction_no');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('sector_code');
            $table->string('subsector_code');
            $table->string('region_code');
            $table->string('department');
            $table->string('position');
            $table->string('mobile');
            $table->string('image_dir');
            $table->string('status');
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
        Schema::dropIfExists('employee_infos');
    }
}
