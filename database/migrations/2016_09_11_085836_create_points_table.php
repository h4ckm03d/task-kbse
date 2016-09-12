<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePointsTable extends Migration {

	public function up()
	{
		Schema::create('points', function(Blueprint $table) {
			$table->string('id', 64)->unique();
			$table->timestamps();
			$table->date('date');
			$table->time('time');
			$table->decimal('longitude');
			$table->decimal('latitude');
			$table->integer('user_id')->unsigned();
			$table->integer('location_id')->unsigned();
			$table->integer('project_id')->unsigned();
			$table->string('event_name', 32)->references('name')->on('events');
			$table->primary('id');
		});
	}

	public function down()
	{
		Schema::drop('points');
	}
}