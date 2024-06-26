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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 300);
            $table->string('image');
            $table->decimal('price', 15, 3);
            $table->date('produced_on');
            $table->unsignedBigInteger('clothes_id'); // Thay đổi từ Tfood_id sang clothes_id
            $table->string('description', 500);
            $table->foreign('clothes_id')->references('id')->on('clothe')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
