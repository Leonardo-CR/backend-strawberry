<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMascotaRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date', 'before_or_equal:today'],
            'peso' => ['required', 'numeric', 'min:0'],
            'raza' => ['required', 'string', 'max:255'],
            'especie_id' => ['required', 'integer', 'exists:especies,id'],
            'cliente_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}
