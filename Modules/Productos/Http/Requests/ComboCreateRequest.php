<?php

namespace Modules\Productos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComboCreateRequest extends FormRequest
{
    public function rules()
    {
         return [
            'producto_categoria_id' =>'required',
            'producto_categoria_sub_id' =>'required',
            'codigo' =>'required|unique:productos',
            'descripcion' =>'required|unique:productos',
              
        ];
    }


     public function messages()
    {
        return [
            'producto_categoria_id.required' => 'No selecciono ninguna categoria.',
            'producto_categoria_sub_id.required' => 'No selecciono ninguna Sub-Categoria.',
            'codigo.unique' => 'Ya hay un producto con el mismo Codigo.',
            'descripcion.unique' => 'Ya hay un producto con la misma descripcion.',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
