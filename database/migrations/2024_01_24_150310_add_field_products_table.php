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
        Schema::table('products_rename', function (Blueprint $table) {

            //Không tồn tại field content và status
            if (!Schema::hasColumn('products_rename', 'name')) {
                $table->string('name', 200)->nullable()->after('id');
            }
            if (!Schema::hasColumn('products_rename', 'description')) {
                $table->text('description')->nullable()->after('name');
            }
            if (!Schema::hasColumn('products_rename', 'status')) {
                $table->boolean('status')->nullable()->default(0)->after('description');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products_rename', function (Blueprint $table) {
            if (Schema::hasColumn('products_rename', 'name')) {
                $table->dropColumn('name');
            }

            if (Schema::hasColumn('products_rename', 'description')) {
                $table->dropColumn('description');
            }

            if (Schema::hasColumn('products_rename', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
