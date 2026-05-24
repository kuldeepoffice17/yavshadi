<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('looking_for', ['bride', 'groom'])->nullable();
            $table->integer('age')->nullable();
            $table->string('religion')->nullable();
            $table->string('city')->nullable();
            $table->string('education')->nullable();
            $table->string('occupation')->nullable();
            $table->string('annual_income')->nullable();
            $table->text('about_me')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('height')->nullable();
            $table->string('mother_tongue')->nullable();
            $table->string('profile_photo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};