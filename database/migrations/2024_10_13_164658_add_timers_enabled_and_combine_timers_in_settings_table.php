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
        Schema::table('settings', function (Blueprint $table) {
            $table->boolean('timers_enabled')->default(false);
            $table->string('timer_type')->nullable();
            $table->unsignedInteger('timer_value')->nullable();
            $table->dropColumn('iteration_timer');
            $table->dropColumn('overall_timer');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('timers_enabled');
            $table->dropColumn('timer_type');
            $table->dropColumn('timer_value');

            $table->integer('iteration_timer')->nullable();
            $table->integer('overall_timer')->nullable();
        });
    }

};
