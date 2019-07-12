<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nis', 50)->unique();
            $table->string('nama', 50);
            $table->text('alamat');
            $table->bigInteger('id_jenis_kelamin')->unsigned();
            $table->bigInteger('id_agama')->unsigned();
            $table->timestamps();

            $table->foreign('id_jenis_kelamin')
                ->references('id')
                ->on('jenis_kelamins')
                ->onDelete('cascade');

            $table->foreign('id_agama')
                ->references('id')
                ->on('agamas')
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
        Schema::dropIfExists('siswas');
    }
}
