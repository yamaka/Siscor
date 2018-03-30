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
            $table->bigInteger('direction_id')->unsigned();
            $table->bigInteger('unit_id')->unsigned()->nullable();
            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);
            $table->string('name');
            $table->string('description');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('direction_id')->references('id')->on('directions');
            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('type_roadmaps', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();

            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);

            $table->string('name');
            $table->string('description');

            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('actions', function (Blueprint $table) {

            $table->bigIncrements('id')->unsigned();

            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);

            $table->string('name');
            $table->string('short_name')->nullable();
            $table->string('description')->nullable();

            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('roadmaps', function (Blueprint $table) {

            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('type_id')->unsigned()->nullable();
            $table->bigInteger('direction_id')->unsigned();

//            $table->bigInteger('direction_created_id')->unsigned()->default(1);
//            $table->bigInteger('unit_created_id')->unsigned()->nullable()->default(1);
//            $table->bigInteger('position_created_id')->unsigned()->default(1);

//            $table->bigInteger('direction_current_id')->unsigned()->default(1);
//            $table->bigInteger('unit_current_id')->unsigned()->nullable()->default(1);
//            $table->bigInteger('position_current_id')->unsigned()->default(1);

            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);

            $table->enum('status', ['finish', 'process','observate','initialize']);

            $table->string('reason');
            $table->string('description');

//            $table->foreign('direction_created_id')->references('id')->on('directions');
//            $table->foreign('unit_created_id')->references('id')->on('units');
//            $table->foreign('position_created_id')->references('id')->on('positions');

//            $table->foreign('direction_current_id')->references('id')->on('directions');
//            $table->foreign('unit_current_id')->references('id')->on('units');
//            $table->foreign('position_current_id')->references('id')->on('positions');

            $table->BigInteger('code_direction')->unsigned()->nullable();
            $table->foreign('direction_id')->references('id')->on('directions');

            $table->foreign('type_id')->references('id')->on('type_roadmaps'); //type of roadmap
            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('sequences', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('action_id')->unsigned();
            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);
//            $table->bigInteger('remitter_id')->unsigned()->default(1);
//            $table->bigInteger('receiver_id')->unsigned()->default(1);
//            $table->bigInteger('remitter_direction_id')->unsigned()->default(1);
//            $table->bigInteger('remitter_unit_id')->unsigned()->default(1)->nullable();
//            $table->bigInteger('remitter_position_id')->unsigned()->default(1);
            $table->bigInteger('remitter_user_id')->unsigned()->default(1);
//            $table->bigInteger('receiver_direction_id')->unsigned()->default(1);
//            $table->bigInteger('receiver_unit_id')->unsigned()->default(1)->nullable();
//            $table->bigInteger('receiver_position_id')->unsigned()->default(1);
            $table->bigInteger('receiver_user_id')->unsigned()->default(1);
            $table->string('name');
            $table->string('short_name');
            $table->string('description');
            $table->boolean('derivated')->default(false);
//            $table->foreign('remitter_id')->references('id')->on('users');
//            $table->foreign('receiver_id')->references('id')->on('users');
//            $table->foreign('remitter_direction_id')->references('id')->on('directions');
//            $table->foreign('remitter_unit_id')->references('id')->on('units');
//            $table->foreign('remitter_position_id')->references('id')->on('positions');
            $table->foreign('remitter_user_id')->references('id')->on('users');
//            $table->foreign('receiver_direction_id')->references('id')->on('directions');
//            $table->foreign('receiver_unit_id')->references('id')->on('units');
//            $table->foreign('receiver_position_id')->references('id')->on('positions');
            $table->foreign('receiver_user_id')->references('id')->on('users');
            $table->foreign('action_id')->references('id')->on('actions');
            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('roadmap_sequence', function (Blueprint $table) {

            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('roadmap_id')->unsigned();
            $table->bigInteger('sequence_id')->unsigned();
            $table->boolean('mirror')->default(false);
            $table->foreign('roadmap_id')->references('id')->on('roadmaps');
            $table->foreign('sequence_id')->references('id')->on('sequences');

        });

    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('secuence_roadmaps');
        Schema::dropIfExists('roadmaps');
        Schema::dropIfExists('actions');
        Schema::dropIfExists('type_roadmaps');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('units');
        Schema::dropIfExists('directions');
    }
}
