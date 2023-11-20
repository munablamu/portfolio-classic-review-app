<?php

namespace App\Http\Requests;

use App\Rules\UniqueUserRecording;
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
            'user_id' => 'required|exists:users,id',
            'recording_id' => 'required|exists:recordings,id', // TODO: user_idとrecording_idの組み合わせの一意性はmigrate時に定義しているのでここではcheckしないことにする
            'rate' => 'required|integer|between:1,5',
            'title' => 'required_with:content',
            'content' => 'required_with:title',
            'like' => ''
        ];
    }

    protected function prepareForValidation()
    {
      $this->merge([
        'user_id' => Auth::id(),
        'recording_id' => $this->route('recording')->id,
      ]);
    }
}
