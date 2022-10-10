<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrHistoryStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_history_status', function (Blueprint $table) {
            $table->bigIncrements('id_history');
            $table->bigInteger('mstr_pengaduan_id')->unsigned();
            $table->foreign('mstr_pengaduan_id')->references('id')->on('mstr_pengaduan')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id_status')->on('mstr_status')
                    ->onUpdate('cascade');
            $table->integer('user_id')->unsigned()->nullable();
            // $table->foreign('user_id')->references('id')->on('users')
            //         ->onUpdate('cascade');
            $table->longtext('keterangan')->nullable();
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
        Schema::dropIfExists('tr_history_status');
    }
}
