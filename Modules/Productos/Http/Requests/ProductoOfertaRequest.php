<?php

namespace Modules\Productos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoOfertaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'fecha_inicio' =>'required|date_format:d/m/Y H:i:s',
            'fecha_fin' => 'required|date_format:d/m/Y H:i:s|after:fecha_inicio',
            'descuento' =>'required',    
        ];
    }


     public function messages()
    {
        return [
            'fecha_inicio.required' => 'No selecciono ninguna Fecha.',
            'fecha_fin.required' => 'No selecciono ninguna Fecha.',
            'fecha_fin.after' => 'La fecha FIN no puede ser menor que la fecha INICIO.',
            'descuento.required' => 'No selecciono ningun descuento.',
        ];
    }

}
