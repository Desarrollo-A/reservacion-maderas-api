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
        Schema::create('driver_request', function (Blueprint $table) {
            $table->foreignId('request_id')
                ->constrained();
            $table->foreignId('driver_id')
                ->nullable()
                ->constrained();
            $table->string('output_place');
            $table->string('destination_place');
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
        Schema::dropIfExists('driver_request');
    }
};
