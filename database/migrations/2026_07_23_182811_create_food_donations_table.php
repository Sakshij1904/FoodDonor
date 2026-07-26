<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('food_donations', function (Blueprint $table) {

            $table->id();

            $table->string('donor_name');
            $table->string('phone');
            $table->string('email');

            $table->string('food_type');

            $table->string('quantity');

            $table->text('address');

            $table->dateTime('expiry_time');

            $table->enum('status',['Available','Accepted','Expired'])->default('Available');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('food_donations');
    }
};