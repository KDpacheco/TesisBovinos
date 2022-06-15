<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalFormRequest extends FormRequest
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
            'código'=>'required|unique:animal,animal_id',
            'color'=> 'required|max:256',
            'peso'=>'required|min:0',
            'raza'=>'required',
            'sexo'=>'required',
            'nacimiento'=>'required|date',
            'nueva_raza'=>'required_if:raza,other',
        ];
    }
}
