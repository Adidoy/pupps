<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtmt_items', function(Blueprint $table){
            $table->increments('id');
            $table->integer('category')->unsigned();
            $table->foreign('category')
                    ->references('id')
                    ->on('dtmt_itemcategories');
            $table->integer('uom')->unsigned();
            $table->foreign('uom')
                    ->references('id')
                    ->on('dtmt_unitsofmeasure');            
            $table->string('itemspecs',500);
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
        Schema::drop('dtmt_items');
    }
}
