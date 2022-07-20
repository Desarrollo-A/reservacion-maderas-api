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
            $table->smallInteger('duration')
                ->nullable();
            $table->text('comment')
                ->nullable();
            $table->foreignId('user_id')
                ->constrained();
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
