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
        Schema::create('car_request', function (Blueprint $table) {
            $table->foreignId('request_id')
                ->constrained();
            $table->foreignId('car_id')
                ->nullable()
                ->constrained();
            $table->integer('start_km')
                ->nullable();
            $table->integer('end_km')
                ->nullable();
            $table->text('delivery_condition')
                ->nullable();
            $table->text('received_condition')
                ->nullable();
            $table->tinyInteger('start_tank')
                ->nullable();
            $table->tinyInteger('end_tank')
                ->nullable();
            $table->text('observations')
                ->nullable();
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
        Schema::dropIfExists('card_request');
    }
};
