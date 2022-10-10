<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstrPengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstr_pengaduan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_tiket');
            $table->string('nama_pelapor')->nullable();
            $table->string('telp_pelapor')->nullable();
            $table->string('email_pelapor')->nullable();
            $table->longtext('oranglayanan_terlapor');
            $table->string('satuan_kerja');
            $table->date('waktu_kejadian');
            $table->text('tempat_kejadian');
            $table->longtext('judul_pelanggaran');
            $table->longtext('detail_pelanggaran');
            $table->string('kategori_pengaduan')->nullable();
            $table->integer('status_pengaduan')->unsigned();;
            $table->foreign('status_pengaduan')->references('id_status')->on('mstr_status')
                    ->onUpdate('cascade');
            $table->integer('tl_by')->nullable()->unsigned();;
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
        Schema::dropIfExists('mstr_pengaduan');
    }
}
