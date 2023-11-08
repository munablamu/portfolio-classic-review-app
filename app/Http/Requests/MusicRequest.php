<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MusicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // TODO: 管理者権限のあるユーザーにしか実行できないようにする
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
            'composer_id' => 'required|exists:composers,id',
            'title' => 'required',
            'opus' => '' // TODO: 作品番号の正規化は必要？
        ];
    }
}
