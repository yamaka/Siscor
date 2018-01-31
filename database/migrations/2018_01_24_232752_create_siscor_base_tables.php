<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiscorBaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // 1 is super admin
        /*Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('unit_id');
            $table->bigIncrements('position_id');
            $table->bigIncrements('user_created_id')->unsigned()->default(1);
            $table->bigIncrements('user_modified_id')->unsigned()->default(1);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->nullable();
            $table->string('username')->unique();
            $table->string('password', 60);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->timestamps();
            $table->softDeletes();
            $table->rememberToken();
        });*/

        //recursive direction with direction(parent for direction) (relationship)
        Schema::create('directions', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('direction_id')->unsigned()->nullable();
            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);
            $table->string('name');
            $table->string('description');
            $table->foreign('direction_id')->references('id')->on('directions');
            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
                // $table->primary(['direction_id', 'direction_parent_id']);
        });




        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('direction_id')->unsigned();
            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);
            $table->string('name');
            $table->string('description');
            $table->foreign('direction_id')->references('id')->on('directions');
            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });


        // like rol
        Schema::create('positions', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_created_id')->unsigned();
            $table->bigInteger('user_modified_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('description');
            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('position_units', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('position_id')->unsigned();
            $table->bigInteger('unit_id')->unsigned();
            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);
            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('unit_id')->references('id')->on('units');
            //$table->primary(['position_id', 'unit_id']);
            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });



        Schema::create('type_secuence_roadmaps', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);

            $table->string('name');
            $table->string('short_name');
            $table->string('description');

            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('roadmaps', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('type_id')->unsigned()->nullable();
            $table->bigInteger('direction_created_id')->unsigned();
            $table->bigInteger('unit_created_id')->unsigned();
            $table->bigInteger('current_sequence_id')->unsigned();
            $table->enum('status', ['finish', 'process','observate']);

            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);
            $table->string('request');
            $table->string('description');

            $table->foreign('direction_created_id')->references('id')->on('directions');
            $table->foreign('unit_created_id')->references('id')->on('units');
            $table->foreign('type_id')->references('id')->on('type_secuence_roadmaps');
            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('sequences', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('type_id')->unsigned()->nullable();
            $table->bigInteger('from_position_unit_id')->unsigned();
            $table->bigInteger('to_position_unit_id')->unsigned();
            $table->bigInteger('from_user__id')->unsigned();
            $table->bigInteger('to_user_id')->unsigned();

            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);

            $table->foreign('from_position_unit_id')->references('id')->on('position_units');
            $table->foreign('to_position_unit_id')->references('id')->on('position_units');
            $table->foreign('from_user__id')->references('id')->on('users');
            $table->foreign('to_user_id')->references('id')->on('users');
            $table->foreign('type_id')->references('id')->on('type_secuence_roadmaps');
            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('sequences');
        Schema::dropIfExists('roadmaps');
        Schema::dropIfExists('type_secuence_roadmaps');
        Schema::dropIfExists('users');
        Schema::dropIfExists('position_units');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('units');
        Schema::dropIfExists('directions');
    }
}
