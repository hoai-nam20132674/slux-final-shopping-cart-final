<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class editUserRequest extends Request
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
            
            'email' => 'email|unique:users,email,'.$this->id,
            'name' => 'unique:users,name,'.$this->id,
            'confirm_password'=>'same:password',
 

        ];
    }
    public function messages(){
        return [
            'email.unique' => 'Tài khoản này đã được sử dụng',
            'name.unique'=>'Tài khoản đã được sử dụng',
            'confirm_password.same'=>'Xác thực mật khẩu không chính xác',
            
        ];
    }
}
