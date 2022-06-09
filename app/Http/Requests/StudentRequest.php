<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            "names" => ["required"],
            "lastnames" => ["required"],
            "brithday" => ["required"],
            "address" => ["required"],
            "email" => ["required"],
            "phone" => ["required"],
            "city_id" => ["required"]
        ];
    }
}