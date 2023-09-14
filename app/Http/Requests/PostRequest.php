<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'message' => 'required|max:255',
            'post_type' => 'in:1,2',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'please enter title here',
            'message.required' => 'please enter message',
            // 'type.required' => 'please enter type',
        ];
    }
}