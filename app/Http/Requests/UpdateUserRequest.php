<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPasswordRule;
use App\Rules\NotBlankOldPasswordRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function prepareForValidation(){
        $this->merge([
            "password" => Hash::make($this->password)
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "max:50"],
            "email" => ["required", "max:50", "email"],
            "old_password" => ["nullable", new MatchOldPasswordRule()],
            "new_password" => ["nullable", new NotBlankOldPasswordRule()]
        ];
    }
}