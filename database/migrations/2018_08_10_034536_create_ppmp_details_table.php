<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpmpDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trxn_ppmpdetails', function(Blueprint $table){
            $table->string('ppmp_control');
            $table->foreign('ppmp_control')
                    ->references('ppmp_control')
                    ->on('trxn_ppmpheader');        
            $table->integer('item')->unsigned();
            $table->foreign('item')
                    ->references('id')
                    ->on('dtmt_items');
            $table->integer('month')->unsigned();
            $table->foreign('month')
                    ->references('id')
                    ->on('auxi_months');
            $table->integer('qtyrequirement')->unsigned();
            $table->decimal('unitcost',11,2);
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
        Schema::drop('trxn_ppmpdetails');
    }
}
