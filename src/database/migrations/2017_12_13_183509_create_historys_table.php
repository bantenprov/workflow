<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorysTable extends Migration {

	public function up()
	{
		Schema::create('historys', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('content_id')->unsigned()->index();
			$table->integer('workflow_id')->unsigned()->index();
			$table->integer('from_state')->unsigned()->index();
			$table->integer('to_state')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('historys');
	}
}
