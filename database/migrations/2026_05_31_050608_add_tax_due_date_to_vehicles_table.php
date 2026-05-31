<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(
            'vehicles',
            function (Blueprint $table) {

                $table->date(
                    'tax_due_date'
                )->nullable();
            }
        );
    }

    public function down(): void
    {
        Schema::table(
            'vehicles',
            function (Blueprint $table) {

                $table->dropColumn(
                    'tax_due_date'
                );
            }
        );
    }
};