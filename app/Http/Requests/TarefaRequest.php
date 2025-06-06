<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TarefaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => ['required', 'string', 'max:255'],
            'condominium_id' => ['required', 'exists:condominiums,id'],
            'maintenance_date' => ['required', 'date'],
            'due_months' => ['nullable', 'integer', 'min:0'],
            'repeat_months' => ['nullable', 'integer', 'min:0'],
            'priority' => ['required', 'in:Alta,Média,Baixa'],
            'status' => ['required', 'in:Não iniciada,Em andamento,Em execução,Concluída'],
            'situation' => ['required', 'in:Em dia,Atrasado'],
            'notes' => ['nullable', 'string'],
            'provider_id' => ['nullable', 'exists:providers,id'],
        ];
    }
}
