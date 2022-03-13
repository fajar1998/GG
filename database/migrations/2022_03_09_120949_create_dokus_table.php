<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('kat_id');
            $table->integer('unit_id');
            $table->enum('tipe_doku', ['Nakes', 'Dokter']);
            $table->string('oleh');
            $table->string('file');
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
        Schema::dropIfExists('dokus');
    }
}
