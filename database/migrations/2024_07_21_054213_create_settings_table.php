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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
            $table->string('wa_numbers')->nullable('62895381587961');
            $table->string('wa_message')->nullable("halo saya tertarik dengan produk ini");
            $table->longText('meta_keywords')->default('perhiasan cincin');
            $table->longText('additional_meta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
