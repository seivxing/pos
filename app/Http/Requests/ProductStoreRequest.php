<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            
            'name' => 'required|string|max:250',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'barcode' => 'required|unique:products|string|max:50',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'status' => 'required|boolean',

        ];
    }
}
