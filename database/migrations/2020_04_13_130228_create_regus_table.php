<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('regu');
            $table->string('jumlah_anggota');
            $table->string('jalur_id')->nullable();
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
        Schema::dropIfExists('regus');
    }
}
