<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
	    Schema::create("customers", function(Blueprint $table) {
           $table->increments("id");
           $table->string("name");
           $table->string("email", 100)->unique();
           $table->string("phone", 15);
           $table->string("address");
           $table->string("photo", 100)->nullable();
           $table->timestamps();
        });
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
	   Schema::drop();
    }

}
