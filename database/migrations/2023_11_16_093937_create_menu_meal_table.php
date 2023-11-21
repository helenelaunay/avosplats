<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menu_meal', function (Blueprint $table) {
            $table->bigInteger('meal_id')->unsigned()->nullable();
            $table->foreign('meal_id')
                  ->references('id')
                  ->on('meals');   

            $table->bigInteger('menu_id')->unsigned()->nullable();
            $table->foreign('menu_id')
                  ->references('id')
                  ->on('menus');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_meal');
    }
};
