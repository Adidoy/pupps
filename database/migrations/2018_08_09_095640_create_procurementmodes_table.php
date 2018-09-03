<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcurementmodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtmt_procurementmodes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('procurementmode_name',75);
            $table->string('description',75)->unique();
            $table->string('abbreviation',10);
            $table->boolean('purge_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dtmt_procurementmodes');
    }
}
