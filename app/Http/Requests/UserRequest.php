<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            // 'email' => 'required|email|unique:users',
            'dob' => 'required|date|before_or_equal:' . \Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
            'gender' =>'required',
            // 'image' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.unique' => 'This email has been created',
            'dob.required' => 'Choose your date of birth',
            'gender.required' => 'Choose your gender type'
        ];
    }
}
