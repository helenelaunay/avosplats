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
        Schema::create('recipe_tag', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('tag_id')->unsigned();
            $table->foreign('tag_id')
                  ->references('id')
                  ->on('tags');   
            
            $table->bigInteger('recipe_id')->unsigned();
            $table->foreign('recipe_id')
                  ->references('id')
                  ->on('recipes');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_tag');
    }
};
