<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class RepeatPasswordRule implements ValidationRule, DataAwareRule
{
    private array $data;
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

     public function setData(array $data){
        $this->data = $data;
        return $this;
     }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $one_password = $this->data["one_password"];
        $repeat_password = $value;
        if($one_password !== $repeat_password){
            $fail("Password do not match");
        }

    }
}