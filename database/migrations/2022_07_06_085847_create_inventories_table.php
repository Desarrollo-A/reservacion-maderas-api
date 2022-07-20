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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('description')
                ->nullable();
            $table->smallInteger('quantity');
            $table->boolean('status')
                ->default(true);
            $table->unsignedSmallInteger('type_id');
            $table->foreign('type_id')
                ->references('id')
                ->on('lookups');
            $table->unsignedSmallInteger('unit_id');
            $table->foreign('unit_id')
                ->references('id')
                ->on('lookups');
            $table->foreignId('office_id')
                ->constrained();
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
        Schema::dropIfExists('inventories');
    }
};
