<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email:dns',
                'max:255',
                Rule::unique(User::class),
            ],
            'no_hp' => ['required', 'min:10', 'max:14'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'nama' => $input['nama'],
            'role' => $input['role'],
            'email' => $input['email'],
            'no_hp' => $input['no_hp'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
