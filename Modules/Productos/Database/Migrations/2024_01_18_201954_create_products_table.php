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
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('uuid')->nullable()->unique('uuid');
            $table->string('code')->nullable();
            $table->string('description')->nullable();
            $table->string('slug')->nullable();
            $table->float('cost_price_usd_ex_tax', 10, 0)->nullable();
            $table->float('cost_price_usd_in_tax', 10, 0)->nullable();
            $table->float('sale_price_usd_ex_tax', 10, 0)->nullable();
            $table->float('sale_price_usd_in_tax', 10, 0)->nullable();
            $table->float('crossed_out_price_usd', 10, 0)->nullable();
            $table->float('cost_price_pesos_ex_tax', 10, 0)->nullable();
            $table->float('cost_price_pesos_in_tax', 10, 0)->nullable();
            $table->float('sale_price_pesos_ex_tax', 10, 0)->nullable();
            $table->float('sale_price_pesos_in_tax', 10, 0)->nullable();
            $table->float('crossed_out_price_pesos', 10, 0)->nullable();
            $table->float('profitability', 10, 0)->nullable();
            $table->string('warranty')->nullable();
            $table->integer('tax_id')->nullable()->index('tax_id');
            $table->integer('tax')->nullable();
            $table->integer('points')->nullable();
            $table->float('discount', 10, 0)->nullable();
            $table->float('price2', 10, 0)->nullable();
            $table->float('profitability2', 10, 0)->nullable();
            $table->float('price3', 10, 0)->nullable();
            $table->float('profitability3', 10, 0)->nullable();
            $table->float('base_unit_stock', 10, 0)->nullable();
            $table->float('stock', 10, 0)->nullable();
            $table->float('stock_per_base_unit', 10, 0)->nullable();
            $table->integer('unit_of_measure_id')->nullable()->index('unit_of_measure_id');
            $table->float('total_stock', 10, 0)->nullable();
            $table->float('critical_stock', 10, 0)->nullable();
            $table->float('ordered_stock', 10, 0)->nullable();
            $table->integer('category_id')->nullable()->index('category_id');
            $table->integer('sub_category_id')->nullable()->index('sub_category_id');
            $table->integer('brand_id')->nullable()->index('brand_id');
            $table->integer('supplier_id')->nullable()->index('supplier_id');
            $table->string('alternate_code')->nullable();
            $table->string('location')->nullable();
            $table->string('bulk_code')->nullable();
            $table->float('bulk_quantity', 10, 0)->nullable();
            $table->string('alert')->nullable();
            $table->string('observations')->nullable();
            $table->string('use_profitability')->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('image')->nullable();
            $table->string('filename')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('thumbnail_filename')->nullable();
            $table->string('enabled')->nullable();
            $table->string('enabled_add_to_cart')->nullable();
            $table->string('offer')->nullable();
            $table->string('hot')->nullable();
            $table->integer('rating_count')->nullable();
            $table->float('rating_cache', 10, 0)->nullable();
            $table->integer('product_combo_id')->nullable();
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
        Schema::dropIfExists('products');
    }
};
