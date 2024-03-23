<?php

namespace App\Http\Requests\Admin\Project\KasKeluar;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKasKeluarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'tanggal' => 'required',
            'project_id' => 'required',
            'deskripsi' => 'required',
        ];
    }
}
