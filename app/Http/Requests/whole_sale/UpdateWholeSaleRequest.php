<?php

namespace App\Http\Requests\whole_sale;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWholeSaleRequest extends FormRequest
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
            'price'=>'required',
            'description'=>'required',
        ];
    }
}
