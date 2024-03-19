<?php

namespace Modules\Productos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'producto_categoria_id' =>'required',
            'producto_categoria_sub_id' =>'required',
            'descripcioncorta' =>'required',
            'codigo' =>'required',
             'descripcion' =>'required',
        ];
    }
}
