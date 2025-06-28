<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Http\Requests\Registration\RegistrationRequest;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'email' => 'required|email|unique:users,email',
            'password' => $this->passwordRules(),
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
        ])->validate();
        
        return User::create([
            'name' => $input['name'],
            'sirname' => $input['sirname'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'accept_terms' => $input['terms'],
            'birthdate' => $input['birthdate'],
            'country' => $input['country']['sigla'],
            'hcaptcha_token' => $input['captcha']['token'],
            'hcaptcha_ekey' => $input['captcha']['eKey'],
            'sex' => $input['sex']
        ]);

    }
}
