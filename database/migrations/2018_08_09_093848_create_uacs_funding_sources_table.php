<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUacsFundingSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtmt_uacsfundingsources', function(Blueprint $table)
        {
            $table->string('uacs_code')->primary();
            $table->string('fundcluster',75);
            $table->string('financingsource',150)->nullable();
            $table->string('authorization',150)->nullable();
            $table->string('fundcategory',150)->nullable();
            $table->string('fundsubcategory',150)->nullable();
            $table->string('description',250)->nullable();
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
        Schema::drop('dtmt_uacsfundingsources');
    }
}
