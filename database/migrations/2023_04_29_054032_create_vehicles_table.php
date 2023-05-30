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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicleno');
            $table->string('updMode');
            $table->string('fromPlace');
            $table->integer('fromState');
            $table->integer('tripshtNo');
            $table->string('userGSTINTransin');
            $table->date('enteredDate');
            $table->integer('transMode');
            $table->string('transDocNo');
            $table->date('transDocDate');
            $table->string('groupNo');
            $table->double('mobile')->nullable();
            $table->integer('user_id')->nullable();
            $table->date('groupdate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
