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
        Schema::table('product_combos', function (Blueprint $table) {
            $table->foreign(['product_category_id'], 'product_combos_ibfk_1')->references(['id'])->on('product_categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['product_category_sub_id'], 'product_combos_ibfk_2')->references(['id'])->on('product_category_subs')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_combos', function (Blueprint $table) {
            $table->dropForeign('product_combos_ibfk_1');
            $table->dropForeign('product_combos_ibfk_2');
        });
    }
};
