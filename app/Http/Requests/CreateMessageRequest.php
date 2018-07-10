<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //autoriza a cualquiera
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
            'message' => ['required','max:160'],
        ];
    }

    /**
     * Get the custom messages
     *
     * @return array
     */
    public function messages(){
        return [
            'message.required' => 'Por favor escribe un mensaje',
            'message.max' => 'El mensaje no puede superar los :max carácteres' 
        ];
    }
}
