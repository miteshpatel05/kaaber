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
            $table->integer('vid'); //foreign key of vehicle table.
            $table->integer('eid'); //foreign key of ewaybills table.
            $table->integer('user_id')->nullable(); //foreign key of ewaybills table.
            $table->integer('lrno')->nullable();
            $table->date('lrdate')->nullable();
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
