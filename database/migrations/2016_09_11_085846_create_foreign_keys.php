<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('points', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('points', function(Blueprint $table) {
			$table->foreign('location_id')->references('id')->on('location')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('points', function(Blueprint $table) {
			$table->foreign('project_id')->references('id')->on('projects')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('points', function(Blueprint $table) {
			$table->foreign('event_name')->references('name')->on('events')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('points', function(Blueprint $table) {
			$table->dropForeign('points_user_id_foreign');
		});
		Schema::table('points', function(Blueprint $table) {
			$table->dropForeign('points_location_id_foreign');
		});
		Schema::table('points', function(Blueprint $table) {
			$table->dropForeign('points_project_id_foreign');
		});
		Schema::table('points', function(Blueprint $table) {
			$table->dropForeign('points_event_name_foreign');
		});
	}
}