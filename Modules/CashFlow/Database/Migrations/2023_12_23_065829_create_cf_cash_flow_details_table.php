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


        Schema::create('cf_cash_flow_details', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36);
            $table->integer('cash_flow_id');
            $table->integer('product_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('user_id');
            $table->string('user_name');

            //nuevos campos
            $table->integer('product_quantity')->nullable();
            $table->integer('measurement_unit_id')->nullable();
            $table->integer('consumed_quantity')->nullable();
            $table->integer('consumed_measurement_unit_id')->nullable();

            $table->float('cost_price_pesos_ex_tax', 20, 2)->nullable();
            $table->float('cost_price_pesos_in_tax', 20, 2)->nullable();
            $table->float('sale_price_pesos_ex_tax', 20, 2);
            $table->float('sale_price_pesos_in_tax', 20, 2)->nullable();
            $table->integer('quantity');
            $table->float('discount', 20, 2)->nullable();
            $table->float('net_discount', 8, 2)->nullable();
            $table->float('net_tax', 20, 2)->nullable();
            $table->float('subtotal', 20, 2)->nullable();
            $table->float('subtotal_with_tax', 20, 2)->nullable();
            $table->double('total', 20, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cf_cash_flow_details');
    }
}
