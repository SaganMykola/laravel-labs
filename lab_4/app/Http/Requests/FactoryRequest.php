<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FactoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"=>"required|string|min:3|max:100",
            "number_of_employees"=>"required",
            "area"=>"required|string|min:5|max:100",
            "address"=>"required|string|min:10|max:200",
            "user_id"=>"required"

        ];
    }
}
