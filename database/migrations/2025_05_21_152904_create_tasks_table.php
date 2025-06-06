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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->foreignId('condominium_id')->constrained('condominiums')->onDelete('cascade');
            $table->date('maintenance_date');
            $table->integer('due_months')->default(0);
            $table->integer('repeat_months')->nullable();
            $table->enum('priority', ['Alta', 'Média', 'Baixa'])->default('Média');
            $table->enum('status', ['Não iniciada', 'Em andamento', 'Em execução', 'Concluída'])->default('Não iniciada');
            $table->enum('situation', ['Em dia', 'Atrasado'])->default('Em dia');
            $table->text('notes')->nullable();
            $table->foreignId('provider_id')->nullable()->constrained('providers')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
