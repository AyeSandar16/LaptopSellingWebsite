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
            $table->id();
            $table->string('model');
            $table->string('display');
            $table->string('memory');
            $table->string('cpu');
            $table->string('storage');
            $table->string('battery');
            $table->string('weight');
            $table->string('feature');
            $table->string('warranty');
            $table->float('discount')->nullabale();
            $table->float('price');
            $table->integer('stock');
            $table->enum('condition',['default','new','hot'])->default('default');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('image');

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')
            ->references('id')
            ->on('brands')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints(); // Disable foreign key constraints

        Schema::dropIfExists('products');

        Schema::enableForeignKeyConstraints(); // Enable foreign key constraints after dropping the table
    }

};
