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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('blog_category_id');
            $table->string('post_title_english');
            $table->string('post_title_bangla');
            $table->string('post_slug_bangla');
            $table->string('post_slug_english');
            $table->string('post_image');
            $table->text('post_details_english');
            $table->text('post_details_bangla');
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
        Schema::dropIfExists('blog_posts');
    }
};
