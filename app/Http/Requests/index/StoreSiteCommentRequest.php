<?php

namespace App\Http\Requests\index;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiteCommentRequest extends FormRequest
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
            'rating_name'=>'required',
            'rating_surname'=>'required',
            'rating_comment'=>'required'
        ];
    }
}
