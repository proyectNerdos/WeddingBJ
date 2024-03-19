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
        Schema::create('cf_unit_details', function (Blueprint $table) {
            $table->integer('id', true);
            $table->char('uuid', 36)->unique('uuid');
            $table->integer('unit_id')->nullable()->index('unit_id');
            $table->integer('detail_category_id')->nullable()->index('detail_category_id');
            $table->text('description')->nullable();
            $table->decimal('cost', 10)->nullable();
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
        Schema::dropIfExists('cf_unit_details');
    }
};
