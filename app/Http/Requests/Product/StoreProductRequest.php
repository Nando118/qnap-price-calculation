<?php

namespace App\Http\Requests\Product;

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
            'sku' => ['required', 'unique:products,sku', 'string', 'min:3'],
            'distri_price' => ['required', 'numeric', 'min:0'],
            'si_price' => ['required', 'numeric', 'min:0'],
            'md_price' => ['required', 'numeric', 'min:0'],
            'sdp_price' => ['required', 'numeric', 'min:0'],
            'srp_price' => ['required', 'numeric', 'min:0'],
            'lkpp_price' => ['required', 'numeric', 'min:0']
        ];
    }

    protected function prepareForValidation()
    {
        $priceFields = [
            'distri_price',
            'si_price',
            'md_price',
            'sdp_price',
            'srp_price',
            'lkpp_price'
        ];

        $formatted = [];
        foreach ($priceFields as $field) {
            if ($this->has($field)) {
                $formatted[$field] = preg_replace('/\D/', '', $this->$field);
            }
        }

        $this->merge($formatted);
    }
}
