<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailListRequest extends FormRequest
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

    {   switch($this->method())
        {
            case 'GET':
            {

            }
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                 return [
                    'name'=> 'required',
                    'username' => 'required | unique:detail_lists',
                ];
            }
            case 'PUT':
            {
                return [
                'name'=> 'required',
                    'username' => 'required',
                    ];
            }
            case 'PATCH':
            {
                 return [
                'name'=> 'required',
                    'username' => 'required',
                    ];
            }
            default:break;
        }

       
    }

    public function messages()
    {
        return [
            'username.required'=> 'mohon isi nama username',
            'username.unique'=> 'nama username ini telah dibuat sebelumnya',
            'name.required'=>'mohon isi nama anda'
        ];
    }
}
