<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class tb_bc_tr_box_count_request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'warehouse_portal_id' => 'nullable',
            'trans_id'              => 'nullable',
            'customer'              => 'nullable',
            'doc_type'              => 'nullable',
            'doc_no'                => 'nullable',
            'doc_date'              => 'nullable',
            'start_date_time'       => 'nullable',
            'end_date_time'         => 'nullable',
            'remarks'               => 'nullable',
            'box_count'             => 'nullable',
            'reject_conveyor_count' => 'nullable',
            'reject_truck_count'    => 'nullable',
        ];
    }
}
