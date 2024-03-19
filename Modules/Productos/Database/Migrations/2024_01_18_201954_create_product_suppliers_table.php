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
        Schema::create('product_suppliers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('uuid')->nullable()->unique('uuid');
            $table->string('business_name')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('skype')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('visit_day')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('observation')->nullable();
            $table->string('status')->nullable();
            $table->string('image')->nullable();
            $table->string('filename')->nullable();
            $table->integer('sort_order')->nullable();
            $table->tinyInteger('is_predefined')->nullable();
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
        Schema::dropIfExists('product_suppliers');
    }
};
