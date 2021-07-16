<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;

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
            'name'  => ['required', 'string', 'max:255'],
            'edad'  => ['required', 'int', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $matri = User::all()->count();
        if($matri==""){
            $matricula= 1;
        }else{
            $matricula =  $matri + 1 ;
        }

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'genero' => $input['genero'],
            'edad' => $input['edad'],
            'slug' => Str::slug($input['name']),
            'password' => Hash::make($input['password']),
            'status_user_id' => '2',
            'matricula' => date('Y').date('m').date('d'). $matricula,
        ]);
    }
}
