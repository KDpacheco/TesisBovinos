<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MontaFormRequest extends FormRequest
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
            'código_madre'=> 'required',
            'código_padre'=> 'required',
            'fecha'=>'required|date',
        ];
    }
}
