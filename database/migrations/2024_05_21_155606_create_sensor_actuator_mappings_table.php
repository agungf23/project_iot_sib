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
        Schema::create('sensor_actuator_mappings', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('sensor_id')->constrained('sensors')->cascadeOnDelete();
            $table->foreignId('actuator_id')->constrained('actuators')->cascadeOnDelete();
            $table->integer('trigger_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_actuator_mappings');
    }
};
