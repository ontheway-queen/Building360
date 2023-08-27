<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class insertComplain extends FormRequest
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
            'complain_creator'  => 'required|integer',
            'complain_category' => 'required|string',
            'complain_date'     => 'required|string',
            'unique_creator'    => 'required|string',
            'complain_text'     => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'complain_creator.required' => 'The complain creator field is required.',
            'complain_creator.integer' => 'The complain creator must be an integer.',
            'complain_text.string' => 'The complain text must be a string',
            'complain_text.required' => 'The complain text must is required',
            'complain_category.required' => 'The complain category field is required.',
            'complain_category.string' => 'The complain category must be a string.',
            'complain_date.required' => 'The complain date field is required.',
            'complain_date.string' => 'The complain date must be a string.',
            'unique_creator.required' => 'The unique creator field is required.',
            'unique_creator.string' => 'The unique creator must be a string.',
        ];
    }
}
