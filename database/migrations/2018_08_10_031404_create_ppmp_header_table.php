<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpmpHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trxn_ppmpheader', function(Blueprint $table){
            $table->string('ppmp_control',16)->primary();
            $table->integer('projecttype')->unsigned();
            $table->foreign('projecttype')
                    ->references('id')
                    ->on('dtmt_projecttypes');
            $table->integer('fiscalyear')->unsigned();
            $table->foreign('fiscalyear')
                    ->references('id')
                    ->on('syad_fiscalyears');
            $table->integer('enduser')->unsigned();
            $table->foreign('enduser')
                    ->references('id')
                    ->on('dtmt_offices');
            $table->integer('preparedby')->unsigned();
            $table->foreign('preparedby')
                    ->references('id')
                    ->on('auth_users');
            $table->integer('submittedby')->unsigned();
            $table->foreign('submittedby')
                    ->references('id')
                    ->on('autr_officesignatories');
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
        Schema::drop('trxn_ppmpheader');
    }
}
