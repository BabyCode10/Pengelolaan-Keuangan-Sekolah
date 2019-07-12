<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nis_siswa', 50);
            $table->string('nama', 50);
            $table->string('kelas', 50);
            $table->string('jenis_bayaran', 25);
            $table->double('jumlah_bayaran', 2, 1);
            $table->string('petugas', 50);
            $table->timestamps();

            $table->foreign('nis_siswa')
                ->references('nis')
                ->on('siswas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
