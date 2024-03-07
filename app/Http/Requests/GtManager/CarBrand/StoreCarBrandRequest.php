<?php

namespace App\Http\Requests\GtManager\CarBrand;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarBrandRequest extends FormRequest
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
            'name_ar' => 'required|string|max:200',
            'name_en' => 'required|string|max:200',
            'logo' => 'required|image|mimes:png', // Adjust allowed extensions
        ];
    }
}
