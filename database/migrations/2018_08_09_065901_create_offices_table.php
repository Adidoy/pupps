<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dtmt_offices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sector')->unsigned();
			$table->foreign('sector')
					->references('id')
					->on('dtmt_sectors');
			$table->integer('head_office')->unsigned()->nullable();
			$table->foreign('head_office')
					->references('id')
					->on('dtmt_offices');
			$table->string('office_code',10);
			$table->string('office_name',100);
			$table->string('office_head',150);
			$table->string('officeheadposition', 50);
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
		Schema::drop('dtmt_offices');
	}

}
