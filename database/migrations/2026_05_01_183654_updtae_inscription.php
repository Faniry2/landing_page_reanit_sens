<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            // Rend telephone non nullable
            $table->string('telephone', 30)->nullable(false)->change();

            // Ajoute whatsapp après telephone
            $table->string('whatsapp', 30)->nullable()->after('telephone');
        });
    }

    public function down(): void
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->string('telephone', 30)->nullable()->change();
            $table->dropColumn('whatsapp');
        });
    }
};
