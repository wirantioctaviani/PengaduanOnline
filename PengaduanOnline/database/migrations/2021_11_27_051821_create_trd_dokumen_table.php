<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrdDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trd_dokumen', function (Blueprint $table) {
            $table->bigIncrements('id_dokumen');
            $table->bigInteger('mstr_pengaduan_id')->unsigned();
            $table->foreign('mstr_pengaduan_id')->references('id')->on('mstr_pengaduan')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            // $table->integer('idt_pic');
            $table->bigInteger('trd_tindaklanjut_id')->unsigned();
            $table->foreign('trd_tindaklanjut_id')->references('id_tindaklanjut')->on('trd_tindaklanjut')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('nama_file');
            $table->integer('is_send')->default(0);
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
        Schema::dropIfExists('trd_dokumen');
    }
}
