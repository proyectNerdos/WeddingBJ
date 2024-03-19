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
        Schema::create('cf_unit_category', function (Blueprint $table) {
            $table->integer('id', true);
            $table->char('uuid', 36)->unique('uuid');
            $table->string('name')->nullable();
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
        Schema::dropIfExists('cf_unit_category');
    }
};
