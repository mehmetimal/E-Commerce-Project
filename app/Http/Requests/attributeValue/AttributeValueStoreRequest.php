<?php

namespace App\Http\Requests\attributeValue;

use Illuminate\Foundation\Http\FormRequest;

class AttributeValueStoreRequest extends FormRequest
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
            'name'=>'required',
            'values'=>'required'
        ];
    }
    public  function  messages()
    {
        return [
            'name.required'=>'Özellik Adı Zorunludur ',
            'values.required'=>'Özellik Değerleri Zorunludur '
        ];
    }
}
