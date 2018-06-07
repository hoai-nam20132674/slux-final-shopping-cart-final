<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class editSlideRequest extends Request
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
            'image'=>'image|mimes:jpg,png,gif,jpeg'
        ];
    }
    public function messages(){
        return [
            'image.image' =>'Định dạng ảnh không đúng',
            'image.mimes' => 'Định dạng ảnh không đúng'
        ];
    }
}
