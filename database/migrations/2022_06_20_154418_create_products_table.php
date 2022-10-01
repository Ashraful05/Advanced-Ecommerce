<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('sub_subcategory_id');
            $table->string('product_name_english');
            $table->string('product_name_bangla');
            $table->string('product_slug_english');
            $table->string('product_slug_bangla');
            $table->string('product_code')->nullable();
            $table->string('product_quantity');
            $table->string('product_tag_english')->nullable();
            $table->string('product_tag_bangla')->nullable();
            $table->string('product_size_english')->nullable();
            $table->string('product_size_bangla')->nullable();
            $table->string('product_color_bangla')->nullable();
            $table->string('product_color_english')->nullable();
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_description_english')->nullable();
            $table->string('short_description_bangla')->nullable();
            $table->string('long_description_bangla')->nullable();
            $table->string('long_description_english')->nullable();
            $table->string('product_thumbnail')->nullable();
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
