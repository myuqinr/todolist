<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MatchOldPasswordRule implements ValidationRule, DataAwareRule
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
        $user = Auth::user();
        $input = $value;
        if(!(Hash::check($input, $user->password))){
            $fail("Password do not match");
        }
    }
}