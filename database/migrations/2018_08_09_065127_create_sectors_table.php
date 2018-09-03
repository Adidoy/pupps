<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dtmt_sectors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('sectorcode',10);
			$table->string('sectorname',75);
			$table->string('sectorhead',150);
			$table->string('sectorheadposition',100);
			$table->string('assisthead',150);
			$table->string('assistheadposition', 100);
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
		Schema::drop('dtmt_sectors');
	}

}
