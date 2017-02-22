<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //make this public for all people anyone can add users now.
        //If this return true then only the authorized user access this section
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'role_id' =>'required',
            'password' =>'required',
            'is_active' => 'required',
            'file'=>'required'
            //this section where you place your validation logics and its so simple
            //and the store method you must replace Request class with UserCreateRequest that you created and also don't forrget to include this

        ];
    }
}
