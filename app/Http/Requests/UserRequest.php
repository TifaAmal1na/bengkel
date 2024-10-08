<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
        $method = strtolower($this->method());
        $user_id = $this->route()->user;

        $rules = [];
        switch ($method) {
            case 'post':
                $rules = [
                    'username' => 'required|max:20',
                    'password' => 'required|confirmed|min:8',
                    'email' => 'required|max:191|email|unique:users',
                    'phone_number'=>'max:13',
                    // 'userProfile.gender' =>  'required',
                    'userProfile.country' =>  'max:191',
                    'userProfile.state' =>  'max:191',
                    'userProfile.city' =>  'max:191',
                    'userProfile.pin_code' =>  'max:191',
                ];
                break;
            case 'patch':
                $rules = [
                    'username' => 'required|max:20',
                    'email' => 'required|max:191|email|unique:users,email,'.$user_id,
                    'phone_number'=>'max:13',
                    'password' => 'confirmed|min:8|nullable',
                    // 'userProfile.gender' =>  'required',
                    'userProfile.country' =>  'max:191',
                    'userProfile.state' =>  'max:191',
                    'userProfile.city' =>  'max:191',
                    'userProfile.pin_code' =>  'max:191',
                ];
                break;

        }

        return $rules;
    }
}