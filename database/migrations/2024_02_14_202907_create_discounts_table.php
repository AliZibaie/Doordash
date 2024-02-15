<?php

use App\Enums\DiscountStatus;
use App\Enums\DiscountType;
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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->dateTime( 'start_at');
            $table->dateTime( 'expire_at');
            $table->text( 'description' )->nullable();
            $table->boolean('is_food_party')->default(false);
            $table->integer('amount')->nullable();
            $table->enum('status' , DiscountStatus::getValues());
            $table->enum('type' , DiscountType::getValues());
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
