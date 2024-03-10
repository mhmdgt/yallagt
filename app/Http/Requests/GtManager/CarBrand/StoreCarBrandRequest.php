<?php

namespace App\Http\Requests\GtManager\CarBrand;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarBrandRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'name_ar' => 'required|string|max:200',
            'name_en' => 'required|string|max:200',
            'logo' => 'required|image|mimes:png', // Adjust allowed extensions
        ];
    }
}