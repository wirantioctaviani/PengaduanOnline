<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstrBidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstr_bidang', function (Blueprint $table) {
            $table->increments('id_bidang');
            $table->string('nama_bidang');
            $table->integer('subbid_id')->unique()->unsigned();
            $table->integer('bidang_id')->unsigned();
        });


        // $data =  array(
        //     [
        //         'nama_bidang' => 'Pengembangan Pembinaan', 'subbid_id' => 11, 'bidang_id' => 1
        //     ],
        //     [
        //         'nama_bidang' => 'Fasilitasi Penerapan Data JFA', 'subbid_id' => 12, 'bidang_id' => 1,
        //     ],
        //     [
        //         'nama_bidang' => 'Sertifikasi', 'subbid_id' => 21, 'bidang_id' => 2,
        //     ],
        //     [
        //         'nama_bidang' => 'Pengelolaan Data JFA', 'subbid_id' => 22, 'bidang_id' => 2
        //     ],
        //     [
        //         'nama_bidang' => 'Program & Evaluasi 1', 'subbid_id' => 31, 'bidang_id' => 3
        //     ],
        //     [
        //         'nama_bidang' => 'Program & Evaluasi 2', 'subbid_id' => 32, 'bidang_id' => 3
        //     ],
        // );
        // foreach ($data as $datum){
        //     $category = new \App\Models\MstrBidang; //The Category is the model for your migration
        //     $category->nama_bidang =$datum['nama_bidang'];
        //     $category->subbid_id =$datum['subbid_id'];
        //     $category->bidang_id =$datum['bidang_id'];
        //     $category->save();
        // }
    }





    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mstr_bidang');
    }
}
