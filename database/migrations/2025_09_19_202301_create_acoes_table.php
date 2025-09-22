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
        Schema::create('acoes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('problema_id')->constrained('problemas')->cascadeOnDelete();

            $table->string('o_que');
            $table->text('por_que');
            $table->string('onde');
            $table->string('quem');
            $table->date('quando');
            $table->text('como'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acoes');
    }
};
