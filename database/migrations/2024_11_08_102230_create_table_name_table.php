<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up()
    {
        Schema::create('abonents', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number')->unique();
            $table->string('home_address');
            $table->string('owner');
            $table->decimal('total_call_duration', 8, 2)->default(0);
            $table->decimal('balance', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abonents');
    }
};
