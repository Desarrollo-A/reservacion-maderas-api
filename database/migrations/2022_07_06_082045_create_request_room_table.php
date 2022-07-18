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
        Schema::create('request_room', function (Blueprint $table) {
            $table->foreignId('request_id')
                ->constrained();
            $table->foreignId('room_id')
                ->constrained();
            $table->tinyInteger('no_people');
            $table->unsignedSmallInteger('level_id');
            $table->foreign('level_id')
                ->references('id')
                ->on('lookups');
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
        Schema::dropIfExists('request_room');
    }
};
