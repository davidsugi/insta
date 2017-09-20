<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
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
            'ig_id'=> 'required',
            'code'=> 'required',
            'thumbnail_src'=> 'required',
            'display_src'=> 'required',
            'owner_id'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'ig_id.required'=> 'mohon isi id ignya',
            'code.required'=> 'mohon isi code dari post ini',
            'thumbnail_src.required'=> 'mohon isi dengan link thumbnail gambar',
            'display_src.required'=> 'mohon isi dengan link gambar',
            'owner_id.required'=> 'mohon isi id pemilik post ini',
        ];
    }
}
