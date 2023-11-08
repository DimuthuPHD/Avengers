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
        Schema::create('shedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('route_id');
            $table->unsignedBigInteger('bus_id');
            $table->string('departure_at');
            $table->string('arrive_at');
            $table->text('notes')->nullable()->default(null);
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('route_id')->references('id')->on('routes');
            $table->foreign('bus_id')->references('id')->on('buses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shedules');
    }
};
