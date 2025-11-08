<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
{

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
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string|in:food,transport,entertainment,utilities,shopping,other',
            'description' => 'required|string|max:500',
            'date' => 'required|date',
            'budget' => 'nullable|numeric|min:0',
        ];
    }
}
