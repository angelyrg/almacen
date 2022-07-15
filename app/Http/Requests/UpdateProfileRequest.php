<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'password_old' => 'required',
            'password_new' => 'required',
            'password_new_confirmation' => 'required|same:password_new',
        ];

        
    }
    
    public function attributes()
    {
        return [
            'password_old' => "contraseña actual",
            'password_new' => "contraseña nueva",
            'password_new_confirmation' => "confirmar contraseña",
        ];
    }


    

}

