<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        $rules = [
            'first_name' => [
                'required',
                'string',
            ],
            'last_name' => [
                'required',
                'string',
            ],
            'email' => [
                'string',
            ],
            'company' => [
                'integer',
            ],
            'phone' => [
                'string',
                'regex:/^\d{2}\s\(\d{3}\)\s\d{3}-\d{4}$/',
            ],
        ];

        switch ($this->getMethod()) {
            case 'POST':
                return $rules;
            case 'PUT':
                return [
                    'email' => 'required',
                ];
//            case 'DELETE':
        }
    }
}
