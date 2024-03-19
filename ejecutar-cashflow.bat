@echo off
SETLOCAL ENABLEDELAYEDEXPANSION

REM Asigna manualmente el nombre del modelo para cada tabla
SET model_cf_sectors=CashFlowSector
SET model_cf_subsectors=CashFlowSubSector
SET model_cf_categories=CashFlowCategory
SET model_cf_subcategories=CashFlowSubCategory
SET model_cf_cash_flows=CashFlow
SET model_cf_units=CashFlowUnit
SET model_cf_unit_details=CashFlowUnitDetail
SET model_cf_unit_category=CashFlowUnitCategory


REM Define las tablas
SET tables=cf_sectors cf_subsectors cf_categories cf_subcategories cf_cash_flows cf_units cf_unit_details cf_unit_category

REM Itera sobre cada tabla
FOR %%G IN (%tables%) DO (
    REM Obtiene el nombre del modelo correspondiente
    SET model=!model_%%G!

    REM Genera el archivo de recursos
    php artisan resource-file:from-database !model! --table-name=%%G

    REM Genera el scaffold
    php artisan create:scaffold !model! --table-name=%%G

    REM Genera los archivos de request
    php artisan make:request Store!model!Request
    php artisan make:request Update!model!Request

)

ENDLOCAL
