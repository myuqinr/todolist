<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

use function PHPUnit\Framework\isEmpty;

class NotBlankOldPasswordRule implements ValidationRule, DataAwareRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    protected array $data;
    public function setData(array $data){
        $this->data = $data;
        return $this;
     }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $new_password = $value;
        $old_password = $this->data["old_password"];
        if(($old_password == "" || trim($old_password == ""))){
                $fail("Old password is empty");
        }
    }
}