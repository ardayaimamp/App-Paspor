<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePengajuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pemohon_id')->unsigned();
            $table->bigInteger('shift_id')->unsigned()->nullable();
            $table->timestamps();
            $table->enum('status',['pending','diterima','ditolak','selesai']);
            $table->date('tanggal_pengajuan');
            $table->string('surat_kehilangan')->nullable();
            $table->foreign('pemohon_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shift_id')->references('id')->on('shift');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan');
    }
}
