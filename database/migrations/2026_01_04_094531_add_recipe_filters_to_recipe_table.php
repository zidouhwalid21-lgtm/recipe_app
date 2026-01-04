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
        Schema::table('recipes', function (Blueprint $table) {
            $table->text('description')->nullable()->after('title');
            $table->boolean('is_vegetarian')->default(false);
            $table->boolean('is_vegan')->default(false);
            $table->boolean('is_halal')->default(false);
            $table->string('recipe_category')->default('main');
            $table->boolean('is_gluten_free')->default(false);
            $table->integer('prep_time_minutes')->nullable();
            $table->string('difficulty')->default('easy');
            $table->string('cuisine')->default('moroccan');
            $table->string('occasion')->default('family dinner');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropColumn([
                'description',
                'is_vegetarian',
                'is_vegan',
                'is_halal',
                'recipe_category',
                'is_gluten_free',
                'prep_time_minutes',
                'difficulty',
                'cuisine',
                'occasion',
            ]);
        });
    }
};
