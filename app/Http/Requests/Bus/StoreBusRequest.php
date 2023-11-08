<?php

namespace App\Http\Requests\Bus;

use Illuminate\Foundation\Http\FormRequest;

class StoreBusRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'owner_name' => 'required|max:100',
            'owner_phone' => 'required|numeric|min:10',
            'owner_address' => 'required|max:300',
            'number_plate' => 'required',
            'notes' => 'sometimes',
            'status' => 'required|boolean',
        ];
    }
}
