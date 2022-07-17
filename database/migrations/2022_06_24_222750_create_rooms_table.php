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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('code', 75)
                ->nullable();
            $table->string('name', 120);
            $table->foreignId('office_id')
                ->constrained();
            $table->smallInteger('no_people');
            $table->tinyInteger('status');
            $table->unsignedBigInteger('recepcionist_id');
            $table->foreign('recepcionist_id')
                ->references('id')
                ->on('users');
            $table->unsignedSmallInteger('status_id');
            $table->foreign('status_id')
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
        Schema::dropIfExists('rooms');
    }
};
