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
        Schema::create('cf_units', function (Blueprint $table) {
            $table->integer('id', true);
            $table->char('uuid', 36)->unique('uuid');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->enum('unit_type', ['vehicle', 'land', 'other'])->nullable();
            $table->text('attributes')->nullable();
            $table->integer('category_id')->nullable()->index('category_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['uuid'], 'uuid_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cf_units');
    }
};
