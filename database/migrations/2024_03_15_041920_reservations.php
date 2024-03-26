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
         Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->integer('phonenumber')->nullable();
            $table->string('roomtype')->nullable();
            $table->date('checkin')->nullable();
            $table->date('checkout')->nullable();
            $table->text('message')->nullable();
            $table->integer('totalFine');
            $table->integer('totalDeposit');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
