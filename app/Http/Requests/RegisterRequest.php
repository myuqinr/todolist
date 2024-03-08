<?php

namespace App\Http\Requests;

use App\Rules\MatchPassword;
use App\Rules\RepeatPasswordRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as RulesPassword;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !(Auth::check());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "max:100"],
            "email" => ["required", "email", "max:100"],
            "one_password" => ["required", RulesPassword::min(6)->symbols()->numbers()],
            "repeat_password" => ["required",RulesPassword::min(6)->symbols()->numbers(), new RepeatPasswordRule()],
        ];
    }
}