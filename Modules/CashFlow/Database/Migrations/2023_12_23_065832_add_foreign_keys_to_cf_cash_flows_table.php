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
        Schema::table('cf_cash_flows', function (Blueprint $table) {
            $table->foreign(['subsector_id'], 'cf_cash_flows_ibfk_1')->references(['id'])->on('cf_subsectors')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['subcategory_id'], 'cf_cash_flows_ibfk_2')->references(['id'])->on('cf_subcategories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['unit_id'], 'cf_cash_flows_ibfk_3')->references(['id'])->on('cf_units')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cf_cash_flows', function (Blueprint $table) {
            $table->dropForeign('cf_cash_flows_ibfk_1');
            $table->dropForeign('cf_cash_flows_ibfk_2');
            $table->dropForeign('cf_cash_flows_ibfk_3');
        });
    }
};
