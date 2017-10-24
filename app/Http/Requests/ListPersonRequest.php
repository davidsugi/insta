<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListPersonRequest extends FormRequest
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
            'list'=> 'required | unique:list_people',
        ];
    }

    public function messages()
    {
        return [
            'list.required'=> 'mohon isi nama list',
            'list.unique'=> 'nama list ini telah dibuat sebelumnya',
        ];
    }
}
