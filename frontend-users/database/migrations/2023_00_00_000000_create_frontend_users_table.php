<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

				/**
					* Run the migrations.
					*
					* @return void
					*/
				public function up()
				{
								Schema::create('frontend_users', function (Blueprint $table) {
												$table->id();
												$table->unsignedBigInteger('language_id')->nullable();
												$table->string('name');
												$table->string('last_name');
												$table->string('email')->unique();
												$table->string('password');
												$table->string('photo')->nullable();
												$table->boolean('is_active');
												$table->timestamps();
								});
				}

				/**
					* Reverse the migrations.
					*
					* @return void
					*/
				public function down()
				{
								Schema::dropIfExists('frontend_users');
				}

};
