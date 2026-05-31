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
        Schema::create('vehicles', function (
            Blueprint $table
        ) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('brand');

            $table->string('type');

            $table->string('plate_number');

            $table->string('category');

            $table->integer('odometer');

            $table->integer(
                'last_service_km'
            );

            $table->integer(
                'service_interval'
            )->default(5000);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(
            'vehicles'
        );
    }
};