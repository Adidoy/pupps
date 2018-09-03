<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_useraccounts', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user')->unsigned();
            $table->foreign('user')
                    ->references('id')
                    ->on('auth_users');        
            $table->string('username',50);
            $table->string('password',50);
            $table->integer('role');
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
        Schema::drop('auth_useraccounts');
    }
}
