<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // dd($this->request->all());
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
            'name'      => 'required',
            'release_date' => 'required|date_format:Y-m-d',
            'producer' => 'required',
            'author_id' => 'required',
            'category_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombres',
            'release_date' => 'Fecha de publicacion',
            'producer' => 'Productora',
            'author_id' => 'Autor',
            'category_id' => 'Categoria'
        ];
    }
}
