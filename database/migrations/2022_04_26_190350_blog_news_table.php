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
        Schema::create('blog_news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('count_like')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();

            $table->string('slug')->unique();
            $table->string('title');

            $table->text('content_row');
            $table->text('content_html');

            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
            //связываю поле user_id с id  в таблице users
            //user_id we connect with this (filed) -> to filed(id) in table users
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_news');
    }
};
