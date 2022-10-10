<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrhKapusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trh_kapus', function (Blueprint $table) {
            $table->bigIncrements('idt_penanggungjawab');
            $table->bigInteger('mstr_pengaduan_id')->unsigned();
            $table->foreign('mstr_pengaduan_id')->references('id')->on('mstr_pengaduan')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('kapus_id')->unsigned();
            $table->foreign('kapus_id')->references('id')->on('users')
            ->onUpdate('cascade');
            $table->integer('has_picked')->default(0);
            $table->integer('is_answering')->default(0);
            $table->integer('has_chosen')->default(0);
            $table->integer('status_pic')->default(0)->unsigned();
            $table->foreign('status_pic')->references('id_status_pic')->on('mstr_status_pic')
                    ->onUpdate('cascade');
            $table->integer('assigned_by')->unsigned();
            $table->foreign('assigned_by')->references('id')->on('users')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('trh_kapus');
    }
}
