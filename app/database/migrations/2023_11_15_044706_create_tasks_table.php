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
            $table->string('task_description');
            $table->date('deadline')->nullable()->default(null);
            $table->unsignedBigInteger('subjects_id');
            $table->unsignedBigInteger('classess_id');
            $table->timestamps();

            $table->foreign('subjects_id')->references('id')->on('subjects');
            $table->foreign('classess_id')->references('id')->on('classess');
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
