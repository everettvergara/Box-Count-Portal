<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class tb_bc_mf_company_request extends FormRequest
{
    public function authorize(): bool
    {
        if (Auth::check()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code'                      => ['required', 'max:30', Rule::unique('tb_bc_mf_company', 'code')->ignore(Request()->id)],
            'name'                      => 'required|max:255',
            'remarks'                   => 'nullable|max:1000',
            'is_active'                 => 'nullable',
        ];
    }
}
