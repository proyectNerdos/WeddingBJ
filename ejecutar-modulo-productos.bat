@echo off
SETLOCAL ENABLEDELAYEDEXPANSION

REM Asigna manualmente el nombre del modelo para cada tabla
SET model_product_brands=ProductBrands
SET model_product_categories=ProductCategories
SET model_product_category_subs=ProductCategorySubs
SET model_product_combo_products=ProductComboProducts
SET model_product_combos=ProductCombos
SET model_product_dollars=ProductDollars
SET model_product_images=ProductImages
SET model_product_offers=ProductOffers
SET model_product_product_tags=ProductProductTags
SET model_product_reviews=ProductReviews
SET model_product_settings=ProductSettings
SET model_product_suppliers=ProductSuppliers
SET model_product_tags=ProductTags
SET model_product_taxes=ProductTaxes
SET model_product_units_of_measure=ProductUnitsOfMeasure
SET model_products=Products



REM Define las tablas
SET tables=product_brands product_categories product_category_subs product_combo_products product_combos product_dollars product_images product_offers product_product_tags product_reviews product_settings product_suppliers product_tags product_taxes product_units_of_measure products
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

pause
ENDLOCAL
