<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'email' => "required|email|unique:App\Models\User,email,{$this->route()->parameter('user')}",
            'first_name' => 'required|string|40',
            'last_name' => 'required|string|40',
            'password' => 'required|string|min:6'
        ];
    }
}
