<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): bool|array
    {
        return [
            'name'            => 'required|string|max:255',
            'description'     => 'nullable|string',
            'price'           => 'required|numeric|min:0',
            'installer_price' => 'nullable|numeric|min:0',
            'stock'           => 'required|integer|min:0',
            'sku'             => 'nullable|string|unique:products,sku,' . ($this->product?->id ?? 'NULL'),
            'image'           => 'nullable|image|max:2048',
            'is_active'       => 'boolean',
        ];
    }
}