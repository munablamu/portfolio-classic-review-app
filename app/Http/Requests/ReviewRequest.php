<?php

namespace App\Http\Requests;

use App\Rules\UniqueUserRecording;
use App\Rules\MultiByteMax;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ReviewRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'recording_id' => ['required', 'exists:recordings,id'], // TODO: user_idとrecording_idの組み合わせの一意性はmigrate時に定義しているのでここではcheckしないことにする
            'rate' => ['required', 'integer', 'between:1,5'],
            'title' => ['required_with:content', new MultiByteMax(50)],
            'content' => ['required_with:title', new MultiByteMax(4000)],
            'like' => [],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => Auth::id(),
            'recording_id' => $this->route('recording')->id,
        ]);
    }

    public function attributes()
    {
        return [
            // 'user_id' => 'ユーザーID',
            // 'recording_id' => 'レコードID',
            'rate' => '評価',
            'title' => 'レビュータイトル',
            'content' => 'レビュー本文',
            'like' => 'いいね'
        ];
    }

    public function messages()
    {
      return [
        // デフォルトのままだと:Valuesに日本語訳が適用されなかったためカスタマイズした。
        'required_with' => ':valuesが入力されている場合、:attributeは必須項目です。',
      ];
    }
}
