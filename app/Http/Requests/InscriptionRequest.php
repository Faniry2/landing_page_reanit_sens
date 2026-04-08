<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscriptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'prenom'    => ['required', 'string', 'min:2', 'max:100'],
            'email'     => ['required', 'email:rfc,dns', 'max:255'],
            'telephone' => ['nullable', 'string', 'regex:/^[+0-9\s\-().]{6,30}$/'],
            'consent'   => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'prenom.required' => 'Ton prénom est requis.',
            'prenom.min'      => 'Ton prénom doit comporter au moins 2 caractères.',
            'email.required'  => 'Ton adresse email est requise.',
            'email.email'     => 'Cette adresse email ne semble pas valide.',
            'telephone.regex' => 'Le numéro de téléphone n\'est pas valide.',
        ];
    }
    protected function prepareForValidation(): void
    {
        $this->merge([
            'prenom'    => trim($this->prenom),
            'email'     => strtolower(trim($this->email)),
            'telephone' => $this->telephone ? trim($this->telephone) : null,
        ]);
    }
}
