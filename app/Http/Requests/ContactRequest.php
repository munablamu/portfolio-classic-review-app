<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'user_email' => ['required', 'email', 'max:255'],
            'title' => ['required', 'max:255'],
            'message' => ['required'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => '件名',
            'message' => 'お問い合わせ内容',
        ];
    }
}
