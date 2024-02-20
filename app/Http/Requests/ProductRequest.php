<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'reference' => 'required|string|unique:products,reference|max:255',
            'price' => 'required|integer|min:0',
            'weight' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
        ];
    }

     /**
     * Get custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El nombre del producto es obligatorio.',
            'reference.required' => 'La referencia del producto es obligatoria.',
            'reference.unique' => 'La referencia del producto ya existe.',
            'price.required' => 'El precio del producto es obligatorio.',
            'price.integer' => 'El precio del producto debe ser un número entero.',
            'price.min' => 'El precio del producto no puede ser negativo.',
            'weight.required' => 'El peso del producto es obligatorio.',
            'weight.integer' => 'El peso del producto debe ser un número entero.',
            'weight.min' => 'El peso del producto no puede ser negativo.',
            'category.required' => 'La categoría del producto es obligatoria.',
            'stock.required' => 'El stock del producto es obligatorio.',
            'stock.integer' => 'El stock del producto debe ser un número entero.',
            'stock.min' => 'El stock del producto no puede ser negativo.',
        ];
    }
}
