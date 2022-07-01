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
        Schema::create('submenu_user', function (Blueprint $table) {
            $table->unsignedTinyInteger('submenu_id');
            $table->foreign('submenu_id')
                ->references('id')
                ->on('submenus');
            $table->foreignId('user_id')
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
        Schema::dropIfExists('submenu_user');
    }
};
