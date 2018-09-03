<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiscalYearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syad_fiscalyears', function(Blueprint $table)
        {
            $table->increments('id');
            $table->char('fiscalyear',4);
            $table->date('yearstart');
            $table->date('yearend');
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
        Schema::drop('syad_fiscalyears');
    }
}
