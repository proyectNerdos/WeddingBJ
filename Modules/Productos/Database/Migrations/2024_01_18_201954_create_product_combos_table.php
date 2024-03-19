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
        Schema::create('product_combos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('uuid')->nullable()->unique('uuid');
            $table->string('code')->nullable();
            $table->string('description')->nullable();
            $table->string('slug')->nullable();
            $table->double('bonus1')->nullable();
            $table->double('total')->nullable();
            $table->integer('points')->nullable();
            $table->integer('product_category_id')->nullable()->index('product_category_id');
            $table->integer('product_category_sub_id')->nullable()->index('product_category_sub_id');
            $table->string('enabled')->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('image1')->nullable();
            $table->string('filename')->nullable();
            $table->string('offer')->nullable();
            $table->string('hot')->nullable();
            $table->integer('rating_count')->nullable();
            $table->float('rating_cache', 10, 0)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_combos');
    }
};
