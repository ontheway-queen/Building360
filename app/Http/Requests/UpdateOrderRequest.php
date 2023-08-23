<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class UpdateOrderRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {

        $a = array();
        $a = [
            'success' => false,
            'message' => $validator->errors()
        ];
        throw new HttpResponseException(response()->json($a, 201));
    }


    public function rules()
    {
        return [
            'dir_name' => 'required|string|min:2|max:20',
            'dir_number' => 'required|string|min:11|max:15',
            'created_by' => 'required|string|min:3|max:55',
        ];
    }


    public function messages()
    {
        return [
            'dir_name.required' => 'The directory name is required.',
            'dir_name.string' => 'The directory name must be a string.',
            'dir_name.min' => 'The directory name must be at least :min characters.',
            'dir_name.max' => 'The directory name must not exceed :max characters.',
            'dir_name.unique' => 'The directory name has already been taken.',

            'dir_number.required' => 'The directory number is required.',
            'dir_number.string' => 'The directory number must be a string.',
            'dir_number.min' => 'The directory number must be at least :min characters.',
            'dir_number.max' => 'The directory number must not exceed :max characters.',

            'created_by.required' => 'The creator name is required.',
            'created_by.string' => 'The creator name must be a string.',
            'created_by.min' => 'The creator name must be at least :min characters.',
            'created_by.max' => 'The creator name must not exceed :max characters.',
        ];
    }
}
