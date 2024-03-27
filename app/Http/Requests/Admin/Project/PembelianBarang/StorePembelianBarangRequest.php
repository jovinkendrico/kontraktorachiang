<?php

namespace App\Http\Requests\Admin\Project\PembelianBarang;

use Illuminate\Foundation\Http\FormRequest;

class StorePembelianBarangRequest extends FormRequest
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
            //
            'tableData' => 'required',
            'tableData.*'  => 'required|string|min:5',
            'tanggal' => 'required',
            'project_id' => 'required',
            'supplier' => 'required',
            'jatuh_tempo' => 'required',
            'status' => 'required',
        ];
    }
}
