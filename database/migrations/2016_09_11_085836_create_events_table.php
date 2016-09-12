<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	public function up()
	{
		Schema::create('events', function(Blueprint $table) {
			$table->string('name', 32)->unique();
			$table->text('description');
			$table->timestamps();
			$table->primary('name');
		});
	}

	public function down()
	{
		Schema::drop('events');
	}
}