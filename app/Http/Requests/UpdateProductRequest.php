<?php

namespace App\Http\Requests;

class UpdateProductRequest extends ApiFormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric|exists:category,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del producto es obligatorio',
            'name.string' => 'El nombre del producto debe ser de tipo string',
            'description.required' => 'La descripción del producto es obligatoria',
            'price.required' => 'El precio del producto es obligatorio',
            'category_id.required' => 'La categoría del producto es obligatoria',
            'category_id.exists' => 'El producto no existe en la categoría',
        ];
    }
}
