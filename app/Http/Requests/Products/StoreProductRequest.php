<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
                "name"=>"required|string|max:255",
                "desc"=>"required|string|max:50",
                "price"=>"required|numeric",
                "qty"=>"required|numeric|min:1",
                "image"=>"required|image|mimes:jpg,png,gif|max:5020",
                "category_id"=>"required|numeric",

        ];
    }
}
