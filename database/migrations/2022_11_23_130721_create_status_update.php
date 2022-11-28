<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_update', function (Blueprint $table) {
            $table->id();
            $table->integer('codProducao');
            $table->string('status',1);
            $table->date('dtmov');
            $table->string('tipo');
            $table->string('codfun');
            $table->string('codsetor');
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
        Schema::dropIfExists('status_update');
    }
};
