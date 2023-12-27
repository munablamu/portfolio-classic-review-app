<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MultiByteMax implements ValidationRule
{
    protected $max;

    public function __construct(int $max)
    {
        $this->max = $max;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ( mb_strlen($value) > $this->max ) {
            $fail(':attributeは最大' . $this->max . '文字までです。');
        }
    }
}
