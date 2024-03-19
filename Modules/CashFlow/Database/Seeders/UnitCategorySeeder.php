<?php

namespace Modules\CashFlow\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UnitCategorySeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $unitTypes = [
            '1' => 'Vehiculo',
            '2' => 'Tierra',
            '3' => 'Otros',
        ];

        foreach ($unitTypes as $key => $name) {
            DB::table('cf_unit_category')->insert([
                'uuid' => \Webpatser\Uuid\Uuid::generate()->string,
                'name' => $name,
                'is_predefined' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
