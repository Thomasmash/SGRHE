<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser  implements CreatesNewUsers
{
    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Validação dos campos principais
        Validator::make($input, [
            'numeroAgente' => ['required', 'numeric', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ], [
            'numeroAgente.required' => 'O número de agente é obrigatório.',
            'numeroAgente.numeric' => 'O número de agente deve ser um número.',
            'numeroAgente.unique' => 'Este número de agente já está em uso.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            'email.unique' => 'Este email já está em uso.',
            'terms.accepted' => 'Você deve aceitar os termos e políticas de privacidade.',
        ])->validate();
        // Validação da senha
		if(isset($input['politicas-seguranca'])){
        $this->validatePassword($input['password']);
		}
		
        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'numeroAgente' => $input['numeroAgente'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function (User  $user) {
                $this->createTeam($user);
            });
        });
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
    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name ?? 'Usuário')[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}