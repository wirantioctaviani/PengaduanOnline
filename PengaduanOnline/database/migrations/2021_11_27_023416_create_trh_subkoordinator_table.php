<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrhSubkoordinatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trh_subkoordinator', function (Blueprint $table) {
            $table->bigIncrements('idt_subkoordinator');
            $table->bigInteger('idt_koordinator')->unsigned();
            $table->foreign('idt_koordinator')->references('idt_koordinator')->on('trh_koordinator')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->bigInteger('mstr_pengaduan_id')->unsigned();
            $table->foreign('mstr_pengaduan_id')->references('id')->on('mstr_pengaduan')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('subbid_id')->unsigned();
            $table->foreign('subbid_id')->references('subbid_id')->on('mstr_bidang')
                    ->onUpdate('cascade');
            $table->integer('subkoor_id')->unsigned();
            $table->foreign('subkoor_id')->references('id')->on('users')
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
        Schema::dropIfExists('trh_subkoordinator');
    }
}
