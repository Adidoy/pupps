<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditOfficeSignatoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autr_officesignatories', function(Blueprint $table){
            $table->increments('id');
            $table->integer('office')->unsigned();
            $table->foreign('office')
                    ->references('id')
                    ->on('dtmt_offices');;            
            $table->string('nameofhead',150);
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
        Schema::drop('autr_officesignatories');
    }
}
