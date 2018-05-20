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
        //recursive direction with direction(parent for direction) (relationship)
        Schema::create('directions', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('direction_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('description');
            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);
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
            $table->string('name');
            $table->string('description');
            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);
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
            $table->string('name');
            $table->string('description');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('direction_id')->references('id')->on('directions');
            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);
            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('type_roadmaps', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);
            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('actions', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->string('short_name')->nullable();
            $table->string('description')->nullable();
            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);
            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('roadmaps', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->BigInteger('roadmap_origin_id')->unsigned()->nullable();
            $table->bigInteger('type_id')->unsigned()->nullable();
            $table->bigInteger('direction_id')->unsigned();

            $table->enum('status', ['finalizado', 'proceso','observado','inicializado','rechazado'])->default('inicializado');
            $table->string('reason');
            $table->string('description');

            $table->BigInteger('code_direction')->unsigned()->nullable();
            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);
            $table->foreign('roadmap_origin_id')->references('id')->on('roadmaps');
            $table->foreign('direction_id')->references('id')->on('directions');
            $table->foreign('type_id')->references('id')->on('type_roadmaps'); //type of roadmap
            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('sequences', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('roadmap_id')->unsigned();
             $table->bigInteger('action_id')->unsigned()->nullable();

            $table->bigInteger('remitter_user_id')->unsigned()->default(1);

            $table->bigInteger('receiver_user_id')->unsigned()->nullable()->default(1);
            $table->boolean('derivated')->default(false);
            $table->integer('order')->unsigned();

            $table->bigInteger('user_created_id')->unsigned()->default(1);
            $table->bigInteger('user_modified_id')->unsigned()->default(1);
            $table->foreign('roadmap_id')->references('id')->on('roadmaps');
            $table->foreign('remitter_user_id')->references('id')->on('users');

            $table->foreign('receiver_user_id')->references('id')->on('users');
            $table->foreign('action_id')->references('id')->on('actions');
            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_modified_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        // Schema::create('roadmap_sequence', function (Blueprint $table) {
        //     $table->bigIncrements('id')->unsigned();
        //     $table->bigInteger('roadmap_id')->unsigned();
        //     $table->bigInteger('sequence_id')->unsigned();
        //     $table->foreign('roadmap_id')->references('id')->on('roadmaps');
        //     $table->foreign('sequence_id')->references('id')->on('sequences');
        //     $table->timestamps();
        //     $table->softDeletes();
        // });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('secuence_roadmaps');
        Schema::dropIfExists('roadmaps');
        Schema::dropIfExists('actions');
        Schema::dropIfExists('type_roadmaps');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('units');
        Schema::dropIfExists('directions');
    }
}
