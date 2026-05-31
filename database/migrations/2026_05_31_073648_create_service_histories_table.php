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
    Schema::create('service_histories', function ($table) {

        $table->id();

        $table->foreignId('vehicle_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->integer('odometer');

        $table->date('service_date');

        $table->timestamps();
    });
}
};
