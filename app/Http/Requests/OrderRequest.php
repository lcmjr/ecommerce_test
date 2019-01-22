<?php

namespace App\Http\Requests;

use App\Rules\CPFValidator;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name'     => 'required',
            'cpf'      => ['required', new CPFValidator],
            'phone'    => 'required|min:9|max:15',
            'email'    => 'required|email',
            'zip_code' => 'required|size:9',
            'state'    => 'required',
            'city'     => 'required',
            'district' => 'required',
            'address'  => 'required',
        ];
    }
}
