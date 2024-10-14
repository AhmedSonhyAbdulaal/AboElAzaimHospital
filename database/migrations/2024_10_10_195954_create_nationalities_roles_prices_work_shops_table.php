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
            $table->unsignedBigInteger('price_id');
            $table->unsignedBigInteger('nation_id');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('work_shop_id');
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
