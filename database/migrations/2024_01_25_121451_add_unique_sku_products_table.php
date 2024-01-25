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

        Schema::table('products', function (Blueprint $table) {
            $table->string('sku', 10)->unique('sku_unique')->after('id');
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique('sku_unique');
            $table->dropColumn('sku');
            $table->dropUnique('products_name_unique');
        });
    }
};