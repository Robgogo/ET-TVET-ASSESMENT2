<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessorInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessor_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ass_pack_no');
            $table->string('full_name');
            $table->string('created_by');
            $table->date('date_of_exam');
            $table->string('app_pack_no');
            $table->string('sector');
            $table->string('sub_sector');
            $table->string('os');
            $table->string('level');
            $table->string('region');
            $table->integer('male_comp');
            $table->integer('female_comp');
            $table->integer('male_inc');
            $table->integer('female_inc');
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
        Schema::dropIfExists('assessor_infos');
    }
}
