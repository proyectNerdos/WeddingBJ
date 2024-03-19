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
        Schema::create('cf_cash_flows', function (Blueprint $table) {
            $table->integer('id', true);
            $table->char('uuid', 36)->unique('uuid');
            $table->date('date')->nullable();
            $table->enum('type', ['income', 'expense'])->nullable();
            $table->decimal('amount', 10)->nullable();
            $table->decimal('amount_usd', 10)->nullable(); // Added column for amount in USD
            $table->string('invoice_number')->nullable(); // Added column for invoice number
            $table->string('remittance_number')->nullable(); // Added column for remittance number
            $table->string('detail')->nullable();
            $table->string('relation_type')->nullable();
            $table->string('module_type')->nullable();
            $table->integer('module_id')->nullable();
            $table->integer('subsector_id')->nullable()->index('subsector_id');
            $table->integer('subcategory_id')->nullable()->index('subcategory_id');
            $table->integer('unit_id')->nullable()->index('unit_id');
            $table->integer('employee_id')->nullable()->index('employee_id');
            $table->integer('employee_sec1_id')->nullable()->index('employee_id');
            $table->integer('employee_sec2_id')->nullable()->index('employee_id');
            $table->integer('operator_hours')->nullable();
            $table->integer('helper1_hours')->nullable();
            $table->integer('helper2_hours')->nullable();
            $table->json('service_details')->nullable();
            $table->integer('client_id')->nullable()->index('client_id');
            $table->string('client_name')->nullable();
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
        Schema::dropIfExists('cf_cash_flows');
    }
};
