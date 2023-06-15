<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'malop' => 'required',
            'tenlop' => 'required',
            'mota' => 'required',
            'soluongsv' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'malop.required' => 'Mã lớp không được để trống',

        ];
    }
}
