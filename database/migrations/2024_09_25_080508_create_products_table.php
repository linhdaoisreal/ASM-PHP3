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
        Schema::dropIfExists('products');

        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cate_id')->constrained('categories');

            $table->string('product_name', 30)->unique();
            $table->string('description', 1000)->nullable();
            $table->double('price',10,2);
            $table->double('sale_price', 10, 2)->nullable();
            $table->string('img_cover', 200)->nullable();
            $table->integer('quantity')->default(0);
            $table->boolean('hot_product')->default(0);
            $table->boolean('status')->default(0);
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
