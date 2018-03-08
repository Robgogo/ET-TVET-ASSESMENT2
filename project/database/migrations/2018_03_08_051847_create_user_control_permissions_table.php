<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserControlPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_control_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('permission_no');
            $table->string('employee_id');
            $table->integer('maintenance_permission_id');
            $table->integer('transaction_permission_id');
            $table->integer('report_permission_id');
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
        Schema::dropIfExists('user_control_permissions');
    }
}
