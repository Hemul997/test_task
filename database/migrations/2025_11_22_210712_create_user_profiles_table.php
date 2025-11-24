<?php

use App\Models\User;
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
        Schema::create('user_profiles', static function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->comment('Пользователь')->constrained()->cascadeOnDelete();
            $table->string('gender', 20)->default('unknown')->comment('Пол');
            $table->date('birthday')->nullable()->comment('Дата рождения');
            $table->string('phone', 20)->nullable()->comment('Телефон');
            $table->timestamps();
            $table->comment('Профили пользователей');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
