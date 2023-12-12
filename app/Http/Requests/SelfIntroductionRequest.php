<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\MultiByteMax;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class SelfIntroductionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'self_introduction' => [new MultiByteMax(4000)],
        ];
    }

    public function attributes(): array
    {
        return [
            'self_introduction' => '自己紹介文',
        ];
    }
}
