<?php

namespace App\Http\Requests\basket;

use Illuminate\Foundation\Http\FormRequest;

class AddItemRequest extends FormRequest
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
            'barcode'=>'required',
            'name'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'product_name'=>'required',
            'image'=>'required',
            'max_quantity'=>'required',
            'shop_id'=>'required'
        ];
    }
}
