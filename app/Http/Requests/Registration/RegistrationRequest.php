<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public static function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'password' => ['required','string','min:8','max:32', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 'confirmed'],
            'password_confirmation' => 'required|string|same:password',
            'birthdate' => ['required','date', Rule::date()->beforeOrEqual(today()->subYears(18)), Rule::date()->afterOrEqual(today()->subYears(100))],
            'name' => 'required|string|min:2|max:191',
            'sirname' => 'required|string|min:2|max:191',
            'sex' => ['required','string', Rule::in(['male', 'female', 'other'])],
            'country' => 'required',
            'country.gentilico' => 'required|string',
            'country.nome_pais' => 'required|string',
            'country.nome_pais_int' => 'required|string',
            'country.sigla' => 'required|string|max:2',
            'terms' => 'required|boolean',
            'captcha' => 'required',
            'captcha.token' => 'required|string',
            'captcha.eKey' => 'required|string'
        ];
    }
}
