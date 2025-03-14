<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JeuxRequest extends FormRequest
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
    public function rules(): array
{
    return [
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'categorie' => 'required|string|max:255',
        'taille' => 'required|numeric',
        'realisateur' => 'required|string|max:255',
        'zip' => 'required|string|max:255',
        'images.*' => 'nullable|url',
        'videos.*' => 'nullable|url',
    ];
}
public function messages()
{
    return [
        'titre.required' => 'Le titre du jeu est obligatoire.',
        'description.required' => 'La description du jeu est obligatoire.',
        'categorie.required' => 'Vous devez sélectionner une catégorie pour le jeu.',
        'realisateur.required' => 'Mentionnez le réalisateur du jeu. ',
        'taille.required' => 'Vous devez indiquer la taille du jeu.',
        'taille.numeric' => 'La taille du jeu doit être un nombre.',
        'zip.required' => 'Le champ zip est requis.',
        'images.*.url' => 'Chaque image doit être une URL valide.',
        'videos.*.url' => 'Chaque vidéo doit être une URL valide.'
    ];
}

}
