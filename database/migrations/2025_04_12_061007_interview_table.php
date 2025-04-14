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
        Schema::create('Interview', function (Blueprint $table) {
            $table->id();
            $table->string('job_name');
            $table->string('candidate_name');
            $table->string('assigned_to_hr');
            $table->string('place');
            $table->string('date');
            $table->string('time'); 
            $table->string('remainder'); 
            $table->string('status')->default('pending');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
