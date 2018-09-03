<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtmt_itemcategories', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('projecttype')->unsigned();
            $table->foreign('projecttype')
                    ->references('id')
                    ->on('dtmt_projecttypes');
            $table->string('uacs',10);
            $table->foreign('uacs')
                    ->references('uacs_code')
                    ->on('dtmt_uacschartofaccounts');
            $table->string('projecttype_name',75)->unique();
            $table->string('description',150);
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
        Schema::drop('dtmt_itemcategories');
    }
}
