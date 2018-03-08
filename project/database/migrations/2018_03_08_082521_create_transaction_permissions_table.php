<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_id');
            $table->string('create_package');
            $table->string('open_package');
            $table->string('post_package');
            $table->string('approve_package');
            $table->string('assesor_info');
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
        Schema::dropIfExists('transaction_permissions');
    }
}
