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
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'username' => [
                'required',
                'string',
                'max:32',
                'min:3',
                Rule::unique(User::class)
            ],
            'password' => $this->passwordRules(),
            'NoHandphone' => [
                'required',
                'string',
                'max:13',
            ],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'NoHandphone' => $input['NoHandphone'],
            'id_bidang' => $input['id_bidang'] ?? 1,
            'email' => $input['email'],
            'username' => $input['username'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
