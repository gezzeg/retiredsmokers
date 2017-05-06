<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

         // Only allow logged in users
        // return \Auth::check();
        // Allows all users in
        
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
            //
            'email' => 'email|required|unique:users',
            'first_name' => 'required|min:5',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ];
    }
}
