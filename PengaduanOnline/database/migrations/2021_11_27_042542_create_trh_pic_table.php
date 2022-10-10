<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrhPicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trh_pic', function (Blueprint $table) {
            $table->bigIncrements('idt_pic');
            $table->bigInteger('idt_subkoordinator')->unsigned();
            $table->foreign('idt_subkoordinator')->references('idt_subkoordinator')->on('trh_subkoordinator')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->bigInteger('mstr_pengaduan_id')->unsigned();
            $table->foreign('mstr_pengaduan_id')->references('id')->on('mstr_pengaduan')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('subbid_id')->unsigned();
            $table->foreign('subbid_id')->references('subbid_id')->on('mstr_bidang')
                    ->onUpdate('cascade');
            $table->integer('pic_id')->unsigned();
            $table->foreign('pic_id')->references('id')->on('users')
            ->onUpdate('cascade');
            $table->integer('status_pic')->unsigned();
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
        Schema::dropIfExists('trh_pic');
    }
}
