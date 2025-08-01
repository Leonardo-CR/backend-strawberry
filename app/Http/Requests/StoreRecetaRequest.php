<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecetaRequest extends FormRequest
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
            'fecha' => ['required', 'date'],
            'hora' => ['required'],
            'duracion' => ['required', 'string', 'max:255'],
            'diagnostico' => ['required', 'string'],
            'tratamiento' => ['required', 'string'],
            'temperatura' => ['required', 'numeric'],
            'peso' => ['required', 'numeric', 'min:0.1', 'max:200'],
            'mascota_id' => ['required', 'exists:mascotas,id'],
            'veterinario_id' => ['required', 'exists:veterinarios,id'],
        ];
    }
}
