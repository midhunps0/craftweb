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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('translatable_id');
            $table->string('translatable_type');
            $table->string('locale');
            $table->string('slug')->nullable();
            $table->json('data');
            $table->foreignId('created_by')->constrained('users', 'id');
            $table->foreignId('last_updated_by')->nullable()->constrained('users', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_page_translations');
    }
};
