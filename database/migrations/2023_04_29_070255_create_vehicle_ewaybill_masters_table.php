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
        Schema::create('vehicle_ewaybill_masters', function (Blueprint $table) {
            $table->id();
            $table->string('vehicleno');
            $table->integer('eid'); //foreign key of ewaybills table.
            $table->integer('updMode');
            $table->string('fromPlace');
            $table->integer('fromState');
            $table->integer('tripshtNo');
            $table->string('userGSTINTransin');
            $table->date('enteredDate');
            $table->integer('transMode');
            $table->integer('transDocNo');
            $table->date('transDocDate');
            $table->integer('groupNo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_ewaybill_masters');
    }
};
