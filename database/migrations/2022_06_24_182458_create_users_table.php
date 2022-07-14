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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('no_employee', 50)
                ->unique();
            $table->string('full_name');
            $table->string('email', 150)
                ->unique();
            $table->string('password');
            $table->string('personal_phone', 10);
            $table->string('office_phone', 10)
                ->nullable();
            $table->string('position', 100);
            $table->string('area', 100);
            $table->unsignedSmallInteger('status_id');
            $table->foreign('status_id')
                ->references('id')
                ->on('lookups');
            $table->unsignedTinyInteger('role_id');
            $table->foreign('role_id')
                ->references('id')
                ->on('roles');
            $table->foreignId('office_id')
                ->nullable()
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
        Schema::dropIfExists('users');
    }
};
