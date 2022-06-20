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
        
        if($this->raza=='other')
        {
            return [
                'código'=>'required|unique:animal,codigo_bien',
                'arete'=>'required|unique:animal,animal_arete',
                'color'=> 'required|max:256',
                'peso'=>'required|min:0',
                'raza'=>'required',
                'sexo'=>'required',
                'nacimiento'=>'required|date',
                'nueva_raza'=>'required_if:raza,other',
                'acr'=>'required_if:raza,other|unique:raza,acr|min:3|max:3'
            ];
            
        }
        else{
            return [
                'código'=>'required|unique:animal,codigo_bien',
                'arete'=>'required|unique:animal,animal_arete',
                'color'=> 'required|max:256',
                'peso'=>'required|min:0',
                'raza'=>'required',
                'sexo'=>'required',
                'nacimiento'=>'required|date',
                'nueva_raza'=>'required_if:raza,other',
            ];
        
    }
    }
}
