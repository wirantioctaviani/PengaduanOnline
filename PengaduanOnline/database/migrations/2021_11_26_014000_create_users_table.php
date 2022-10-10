<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('nip')->unique();
            $table->integer('subbid')->unsigned();
            // $table->foreign('subbid')->references('subbid_id')->on('mstr_bidang')
            // ->onDelete('cascade')
            // ->onUpdate('cascade');
            $table->integer('role')->unsigned();
            $table->foreign('role')->references('id_role')->on('mstr_role')
                    ->onUpdate('cascade');
            $table->integer('is_active')->default('1');
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
        Schema::dropIfExists('users');
    }
}
