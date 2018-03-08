<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_id');
            $table->string('sector_summary');
            $table->string('sub_sector_summary');
            $table->string('os_summary');
            $table->string('level_summary');
            $table->string('region_summary');
            $table->string('item_doc_summary');
            $table->string('package_summary');
            $table->string('assesor_summary');
            $table->string('created_packages_summary');
            $table->string('open_packages_summary');
            $table->string('post_packages_summary');
            $table->string('approve_package_summary');
            $table->string('assesor_info_summary');
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
        Schema::dropIfExists('report_permissions');
    }
}
