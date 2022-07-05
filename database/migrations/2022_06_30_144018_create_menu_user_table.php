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
        Schema::create('menu_user', function (Blueprint $table) {
            $table->unsignedTinyInteger('menu_id')
                ->nullable();
            $table->foreign('menu_id')
                ->references('id')
                ->on('menus');
            $table->unsignedTinyInteger('submenu_id')
                ->nullable();
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
        Schema::dropIfExists('menu_user');
    }
};
