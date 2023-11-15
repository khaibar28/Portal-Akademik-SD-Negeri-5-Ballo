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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->float('task_score')->nullable()->default(null);
            $table->float('UH')->nullable()->default(null);
            $table->float('UAS')->nullable()->default(null);
            $table->unsignedBigInteger('subjects_id');
            $table->unsignedBigInteger('classess_id');
            $table->unsignedBigInteger('school_years_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subjects_id')->references('id')->on('subjects');
            $table->foreign('classess_id')->references('id')->on('classess');
            $table->foreign('school_years_id')->references('id')->on('school_years');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
