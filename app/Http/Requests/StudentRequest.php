<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'code' => 'required',
            'document' => 'required|numeric',
            'name' => ['required', 'min:2', 'max:40'],
            'lastname' => ['required', 'min:2', 'max:40'],
            'birth_date' => 'required|date',
            'average' => ['required', 'numeric', 'between:0,5'],
            'email' => 'email'
        ];
    }
}
