<?php

namespace App\Infra\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchAddressRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $input = $this->route()->parameters();

        if (isset($input['cep'])) {
            $input['cep'] = preg_replace('/[^0-9]/', '', $input['cep']);
        }
        $this->replace($input);
    }

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
            'cep' => [
                'required',
                'regex:/^\d{8}$/',
            ],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cep.required' => __('exceptions.cep_is_required'),
            'cep.regex' => __('exceptions.invalid_cep_format'),
        ];
    }
}
