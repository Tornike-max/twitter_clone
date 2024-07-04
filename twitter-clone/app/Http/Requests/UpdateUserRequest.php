<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // can-ში გამოყენებული იუზერ განსხვავდება დასაწყისშ გამოყენებული უზერიგან,
        // რადგან ლარაველი თავისით რაღაცნაირად აწვდის UserController-ში
        // არსებული update მეთოდის user პარამეტრს.
        // return $this->user()->can('update', $this->user);
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
            'name' => ['max:70', 'min:2', 'string'],
            'bio' => 'nullable|string|min:2|max:255',
            'image' => 'image'
        ];
    }
}
