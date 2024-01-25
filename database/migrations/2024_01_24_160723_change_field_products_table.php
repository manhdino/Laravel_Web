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

            //Delete field default vaule status
            $table->boolean('status')->default(null)->change();

            //Delete null field content 
            $table->text('description')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            //Delete field default vaule status
            $table->boolean('status')->default(0)->change();

            //Delete null field content 
            $table->text('description')->nullable()->change();
        });
    }
};
