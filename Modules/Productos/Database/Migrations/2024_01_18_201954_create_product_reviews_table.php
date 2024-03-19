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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('uuid')->nullable()->unique('uuid');
            $table->integer('product_id')->nullable()->index('product_id');
            $table->integer('user_id')->nullable();
            $table->integer('rating')->nullable();
            $table->string('comment')->nullable();
            $table->string('approved')->nullable();
            $table->string('spam')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_reviews');
    }
};
