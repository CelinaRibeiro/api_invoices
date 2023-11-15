<?php

namespace App\Http\Requests\V1\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceUpdateRequest extends FormRequest
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
            'user_id' => 'sometimes',
            'type' => 'sometimes|max:1|in:' . implode(',', ['B', 'C', 'P']),
            'paid' => 'sometimes|numeric|between:0,1',
            'value' => 'sometimes|numeric|between:1,9999.99',
            'payment_date' => 'nullable'
        ];
    }
}
