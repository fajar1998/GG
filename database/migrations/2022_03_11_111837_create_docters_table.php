<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docters', function (Blueprint $table) {
            $table->string('name');
            $table->integer('kat_id');
            $table->integer('unit_id');
            $table->enum('tipe_doku', ['Nakes', 'Dokter']);
            $table->string('oleh');
            $table->string('update_oleh');
            $table->string('file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docters');
    }
}
