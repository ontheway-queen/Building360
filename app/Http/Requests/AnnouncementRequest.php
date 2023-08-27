<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class AnnouncementRequest extends FormRequest
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
            'announcement_created_by' => 'required|string',
            'announcement_topic' => 'required|string',
            'announcemet_text' => 'required|string',
            'announcemet_date' => 'required|string',
            'announcemet_for' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'announcement_created_by.required' => 'The announcement created by field is required.',
            'announcement_topic.required' => 'The announcement topic field is required.',
            'announcemet_text.required' => 'The announcement text field is required.',
            'announcemet_date.required' => 'The announcement date field is required.',
            'announcemet_for.required' => 'The announcement For field is required.',
        ];
    }
}
