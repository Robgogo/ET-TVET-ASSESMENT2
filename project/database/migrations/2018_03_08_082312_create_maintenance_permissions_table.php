<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenancePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_id');
            $table->string('sector');
            $table->string('sub_sector');
            $table->string('os');
            $table->string('level');
            $table->string('region');
            $table->string('item_doc');
            $table->string('package');
            $table->string('assesor');
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
        Schema::dropIfExists('maintenance_permissions');
    }
}
