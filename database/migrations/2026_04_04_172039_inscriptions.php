<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('prenom', 100);
            $table->string('email', 255)->unique();
            $table->string('telephone', 30)->nullable();
            $table->boolean('consent')->default(false);
            $table->string('source', 100)->nullable()->default('landing_page');
            $table->timestamp('email_envoye_at')->nullable();
            $table->timestamps();

            $table->index('email');
          
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
