<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJalursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jalurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('lokasi');
            $table->string('estimasi');
            $table->string('jumlah_pos');
            $table->string('status');
            $table->string('foto')->nullable();
            $table->string('file')->nullable();
            $table->softDeletes()->nullable();
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
        Schema::dropIfExists('jalurs');
    }
}
