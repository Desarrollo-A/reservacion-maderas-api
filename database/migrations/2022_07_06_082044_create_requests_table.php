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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->tinyInteger('no_people');
            $table->smallInteger('duration')
                ->nullable();
            $table->foreignId('user_id')
                ->constrained();
            $table->unsignedSmallInteger('service_id');
            $table->foreign('service_id')
                ->references('id')
                ->on('lookups');
            $table->unsignedSmallInteger('level_id');
            $table->foreign('level_id')
                ->references('id')
                ->on('lookups');
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
        Schema::dropIfExists('requests');
    }
};
