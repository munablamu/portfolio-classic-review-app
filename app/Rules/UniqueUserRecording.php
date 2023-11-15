<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniqueUserRecording implements ValidationRule
{
    protected $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ( DB::table('reviews')->where('user_id', $this->user_id)
                                 ->where('recording_id', $value)
                                 ->exists() ) {
            $fail('一人のユーザーが同じ録音に対して複数のレビューを投稿することはできません。');
        }
    }
}
