<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'string', 'max:255', Rule::unique('users')->ignore(Auth::user())],
            'password' => ['nullable', 'string', 'confirmed', 'min:8'],
            'first_name' => ['nullable', 'string'],
            'surname' => ['nullable', 'string'],
            'company_name' => ['nullable', 'string'],
            'pesel' => ['nullable', 'string', 'unique:users', 'min:11', 'max:11'], //dodac algorytm
            'nip' => ['nullable', 'string', 'unique:users', 'min:9', 'max:9'], //dodac algorytm
        ];
    }

    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->password == null) {
            $this->request->remove('password');
        }
    }
}
