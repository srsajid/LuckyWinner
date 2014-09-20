<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegistrationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
	    Schema::create("registrations", function(Blueprint $table) {
            $table->increments("id");
            $table->date("date");
            $table->integer("customer_id")->unsigned();
            $table->boolean("is_lucky");
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
	    Schema::drop("registrations");
    }

}
