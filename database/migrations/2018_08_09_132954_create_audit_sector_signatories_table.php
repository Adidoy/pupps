<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditSectorSignatoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autr_sectorSignatories', function(Blueprint $table){
            $table->increments('id');
            $table->integer('sector')->unsigned();
            $table->foreign('sector')
                    ->references('id')
                    ->on('dtmt_sectors');;            
            $table->string('nameofhead',150);
            $table->string('nameofassistant',150);
            $table->string('action_done',20);
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
        Schema::drop('autr_sectorSignatories');
    }
}
