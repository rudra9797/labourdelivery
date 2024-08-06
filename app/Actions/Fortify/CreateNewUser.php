<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Enums\UserRole;
use App\Models\Customer;

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
        $this->validateRequest($input);

        $customer = Customer::create(['company_name' => $input['company_name']]);


        return User::create([
            'first_name' => $input['first_name'],
            'last_name'  => $input['last_name'],
            'email'      => $input['email'],
            'role'       =>  UserRole::Customer,
            'password'   => Hash::make($input['password']),
            'userable_type' => Customer::class,
            'userable_id'   => $customer->id,
        ]);
    }

    public function validateRequest($input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:150'],
            'last_name' => ['required', 'string', 'max:150'],
            'email' => [
                'required',
                'string',
                'email',
                'max:150',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'password_confirmation' => 'required|same:password',
        ])->validate();
    }
}
