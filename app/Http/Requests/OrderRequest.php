<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'product_currency' => 'required|string|max:3',
            'product_price'    => 'required|numeric',
            'product_quantity' => 'required|integer|min:1',
            'name'             => 'required|string|max:255',
            'email'            => 'required|email',
            'mobile'           => 'required|string|max:10',
        ];
    }
}
