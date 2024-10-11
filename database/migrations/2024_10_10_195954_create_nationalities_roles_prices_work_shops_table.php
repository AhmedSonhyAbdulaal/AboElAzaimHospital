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
        Schema::create('nationalities_roles_prices_work_shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('price_id')->constrained('prices')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('nation_id')->constrained('nationalities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('work_shop_id')->constrained('work_shops')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->comment('relation ship between price, nationality, roleType and work_shop to easy change values in the future');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nationalities_roles_prices_work_shops');
    }
};
