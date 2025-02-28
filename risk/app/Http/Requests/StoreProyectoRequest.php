<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProyectoRequest extends FormRequest
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
            "titulo" => "required|string|min:5",
            "horas_previstas" => "required|integer",
            "fecha_inicio" => "required|date|before:today",
        ];
    }

    public function messages(): array{
        return [
            "titulo.required" => "El titulo es obligatorio",
            "titulo.min" => "El titulo debe tener al menos 5 caracteres",
            "titulo.string" => "El titulo debe ser una cadena de texto",
            "horas_previstas.required" => "Las horas previstas son obligatorias",
            "fecha_inicio.required" => "La fecha de inicio es obligatoria",
            "fecha_inicio.before" => "La fecha de inicio debe anterior a la actual",
        ];
    }
}
