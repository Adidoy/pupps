<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auth_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('office')->unsigned();
			$table->foreign('office')
					->references('id')
					->on('dtmt_offices');
			$table->string('firstname',75);
			$table->string('middlename',75)->nullable();
			$table->string('lastname',75);
			$table->string('contact',20)->nullable();
			$table->string('email',75)->nullable();
			$table->string('designation');
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
		Schema::drop('auth_users');
	}

}
