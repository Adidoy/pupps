<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUacsChartOfAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtmt_uacschartofaccounts', function(Blueprint $table)
        {
            $table->string('uacs_code')->primary();
            $table->string('classification',75);
            $table->string('subclass',150)->nullable();
            $table->string('group',150)->nullable();
            $table->string('objectcode',150)->nullable();
            $table->string('subobjectcode',150)->nullable();
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
        Schema::drop('dtmt_uacschartofaccounts');
    }
}
