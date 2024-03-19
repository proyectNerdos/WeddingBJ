<?php

namespace Modules\CashFlow\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CashFlowDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UnitCategorySeeder::class);
        // Model::unguard();
        // $this->call("OthersTableSeeder");
    }
}
