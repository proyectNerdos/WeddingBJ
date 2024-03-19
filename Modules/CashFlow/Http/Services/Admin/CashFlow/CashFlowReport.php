<?php

namespace Modules\CashFlow\Http\Services\Admin\CashFlow;

use Modules\CashFlow\Entities\CashFlow;
use DataTables;

class CashFlowReport
{

    public function report($query)
    {

        $query = $query->get();
        // Calcula los totales usando la consulta
        $totalIngresos = $query->where('type', 'income')->sum('amount');
        $totalEgresos = $query->where('type', 'expense')->sum('amount');
        $gananciasTotales = $totalIngresos - $totalEgresos;

        //calculo de totales ahora para USD
        $totalIngresosUsd = $query->where('type', 'income')->sum('amount_usd');
        $totalEgresosUsd = $query->where('type', 'expense')->sum('amount_usd');
        $gananciasTotalesUsd = $totalIngresosUsd - $totalEgresosUsd;

        // Retorna los totales calculados
        return [
            'totalIngresos' => $totalIngresos,
            'totalEgresos' => $totalEgresos,
            'gananciasTotales' => $gananciasTotales,
            'totalIngresosUsd' => $totalIngresosUsd,
            'totalEgresosUsd' => $totalEgresosUsd,
            'gananciasTotalesUsd' => $gananciasTotalesUsd,
        ];
    }
}



