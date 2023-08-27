<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class participateRequest extends FormRequest
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
            'event_created_by'  => 'required|integer',
            'unique_creator' => 'required|string',
            'event_title'     => 'required|string',
            'event_date'    => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'event_created_by.required' => 'The event created by field is required.',
            'event_created_by.integer' => 'The event created by field must be an integer.',
            'unique_creator.required' => 'The unique creator field is required.',
            'unique_creator.string' => 'The unique creator field must be a string.',
            'event_title.required' => 'The event title field is required.',
            'event_title.string' => 'The event title field must be a string.',
            'event_date.required' => 'The event date field is required.',
            'event_date.string' => 'The event date field must be a string.',
        ];
    }
}
