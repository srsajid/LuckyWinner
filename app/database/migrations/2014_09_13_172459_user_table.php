<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
        Schema::create("users", function(Blueprint $table) {
            $table->increments("id");
            $table->string("name", 100);
            $table->string("username", 100);
            $table->string("password", 100)->unique();
            $table->string("email", 100)->unique();
            $table->string("remember_token", 100)->nullable();
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
        Schema::drop("users");
	}

}