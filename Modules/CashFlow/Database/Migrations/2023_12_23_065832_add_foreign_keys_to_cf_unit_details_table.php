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
        Schema::table('cf_unit_details', function (Blueprint $table) {
            $table->foreign(['unit_id'], 'cf_unit_details_ibfk_1')->references(['id'])->on('cf_units')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['detail_category_id'], 'cf_unit_details_ibfk_2')->references(['id'])->on('cf_unit_category')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cf_unit_details', function (Blueprint $table) {
            $table->dropForeign('cf_unit_details_ibfk_1');
            $table->dropForeign('cf_unit_details_ibfk_2');
        });
    }
};
