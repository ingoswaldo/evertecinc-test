<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'order_id'         => 'required|integer',
            'subtotal'         => 'required|numeric',
            'transaction_cost' => 'required|numeric',
            'total'            => 'required|numeric',
            'reference'        => 'required|string',
            'currency'         => 'required|string'
        ];
    }
}
