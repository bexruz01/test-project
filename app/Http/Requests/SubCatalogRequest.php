<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCatalogRequest extends FormRequest
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
        $rules = [
            'code' => 'required|min:3|max:255|unique:categories,code',
            'name' => 'required|min:3|max:255',
        ];

        if ($this->route()->named('sub_catalogs.update')) {
            $rules['code'] .= ',' . $this->route()->parameter('sub_catalog')->id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для ввода',
            'min' => 'Поле :attribute должно иметь минимум :min символов',
            'code.min' => 'Поле код должно содержать не менее :min символов',
        ];
    }
}
