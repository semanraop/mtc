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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->enum('status',['pending','loan','returned']);
            // $table->string('serialno');
            $table->foreignId('serialno')->constrained('mtcs')->onDelete('cascade');
            $table->string('proof');
            $table->boolean('cable')->default(0);
            $table->boolean('mouse')->default(0);
            $table->boolean('bag')->default(0);
            $table->boolean('adapter')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
