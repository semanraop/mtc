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
        Schema::create('mtcs', function (Blueprint $table) {
            $table->id();
            $table->string('serialno', 50)->unique();
            $table->string('mac', 17)->unique();
            $table->foreignId('model')->constrained('mtcmodels')->onDelete('cascade');
            $table->string('tagging')->default('NO TAGGING');
            $table->enum('status', ['store', 'deployed', 'loan'])->default('store');

            //optional since ada 3 status
            $table->string('user')->nullable();
            $table->foreignId('seatid')->nullable()->constrained('locations')->onDelete('cascade');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mtcs');
    }
};