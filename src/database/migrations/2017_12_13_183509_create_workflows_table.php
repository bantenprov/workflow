<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkflowsTable extends Migration {

	public function up()
	{
		Schema::create('workflows', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('content_id')->unsigned()->nullable()->index();
			$table->string('content_type', 100)->index();
			$table->string('name', 32)->unique();
			$table->string('label', 191)->index();
		});
	}

	public function down()
	{
		Schema::drop('workflows');
	}
}
