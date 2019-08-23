<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    private $user_id = null;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        $this->user_id = is_null($this->user) ? null : $this->user->id;

        return [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email,' . $this->user_id,
            'email_verified_at' => 'nullable|date',
            'password' => 'required|max:255',
            'remember_token' => 'nullable|max:100',
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'id',
            'name' => 'name',
            'email' => 'email',
            'email_verified_at' => 'email_verified_at',
            'password' => 'password',
            'remember_token' => 'remember_token',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];
    }

    public function message()
    {
        return [
            //
        ];
    }
}
