<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrdTindaklanjutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trd_tindaklanjut', function (Blueprint $table) {
            $table->bigIncrements('id_tindaklanjut');
            $table->bigInteger('mstr_pengaduan_id')->unsigned();
            $table->foreign('mstr_pengaduan_id')->references('id')->on('mstr_pengaduan')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->bigInteger('idt_kapus')->nullable()->unsigned();
            $table->foreign('idt_kapus')->references('idt_penanggungjawab')->on('trh_kapus')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->bigInteger('idt_koordinator')->nullable()->unsigned();
            $table->foreign('idt_koordinator')->references('idt_koordinator')->on('trh_koordinator')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->bigInteger('idt_subkoordinator')->nullable()->unsigned();
            $table->foreign('idt_subkoordinator')->references('idt_subkoordinator')->on('trh_subkoordinator')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->bigInteger('idt_pic')->nullable()->unsigned();
            $table->foreign('idt_pic')->references('idt_pic')->on('trh_pic')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                    // ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('bidang_id')->nullable()->unsigned();
            // $table->foreign('bidang_id')->references('bidang_id')->on('mstr_bidang')
            //         ->onUpdate('cascade');
            $table->integer('subbid_id')->nullable()->unsigned();
            $table->foreign('subbid_id')->references('subbid_id')->on('mstr_bidang')
                    ->onUpdate('cascade');
            $table->longtext('tindak_lanjut');
            $table->integer('status_tindaklanjut')->unsigned();
            $table->foreign('status_tindaklanjut')->references('id_status')->on('mstr_status')
                    ->onUpdate('cascade');
            $table->integer('tl_by')->unsigned();
            $table->foreign('tl_by')->references('id_role')->on('mstr_role')
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
        Schema::dropIfExists('trd_tindaklanjut');
    }
}
