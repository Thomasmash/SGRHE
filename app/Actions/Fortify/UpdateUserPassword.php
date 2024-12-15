<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
		dd('Cheguei verifica no fortify do livewere Actions app');
		// Validação da senha
		if(isset($input['politicas-seguranca'])){
        $this->validatePassword($input['password']);
		}
		
        Validator::make($input, [
            'current_password' => ['required', 'string', 'current_password:web'],
            'password' => $this->passwordRules(),
        ], [
            'current_password.current_password' => __('The provided password does not match your current password.'),
        ])->validateWithBag('updatePassword');

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
	
		//Validacao de password para politicas recomendadas //231297
    protected function validatePassword(string $password): void
    {
        Validator::make(['password' => $password], [
            'password' => [
                'required',
                'string',
                'min:8', // Mínimo de 8 caracteres
                'regex:/[a-z]/', // Pelo menos uma letra minúscula
                'regex:/[A-Z]/', // Pelo menos uma letra maiúscula
                'regex:/[0-9]/', // Pelo menos um número
                'regex:/[@$!%*?&]/', // Pelo menos um caractere especial
            ],
        ], [
            'password.required' => 'A password é obrigatória.',
            'password.min' => 'A password deve ter pelo menos 8 caracteres.',
            'password.regex' => 'A password deve conter pelo menos uma letra maiúscula, uma letra minúscula, um número e um caractere especial.',
        ])->validate();
    }
}
