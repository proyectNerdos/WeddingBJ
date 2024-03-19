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
        Schema::table('cf_subcategories', function (Blueprint $table) {
            $table->foreign(['category_id'], 'cf_subcategories_ibfk_1')->references(['id'])->on('cf_categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cf_subcategories', function (Blueprint $table) {
            $table->dropForeign('cf_subcategories_ibfk_1');
        });
    }
};
