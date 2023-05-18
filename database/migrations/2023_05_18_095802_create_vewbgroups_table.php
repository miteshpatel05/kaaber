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
        Schema::create('vewbgroups', function (Blueprint $table) {
            $table->id();
            $table->integer("vewbid");
            $table->integer("userid");
            $table->double("drivermobileno");
            $table->integer("irno");
            $table->date("irdate");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vewbgroups');
    }
};
