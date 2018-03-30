<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('position_id')->nullable();
            $table->bigInteger('user_created_id')->default(1);
            $table->bigInteger('user_modified_id')->default(1);
            $table->string('name');
            $table->string('lastname');
            $table->string('phone')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->enum('status', ['active', 'inactive'])->default('active');
            //$table->foreign('unit_id')->references('id')->on('units');
            //$table->foreign('position_id')->references('id')->on('positions');
            $table->timestamps();
            $table->softDeletes();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
