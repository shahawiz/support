<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PragmaRX\Countries\Package\Countries;

class ProfileFormRequest extends FormRequest
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
        $countries = Countries::all()->pluck('name.common')->toArray();
        return [
            'name'=>'required|string',
            'address'=>'required|string',
            'city'=>'required|string',
            'state'=>'required|string',
            'phone'=>'required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/',
            'zip'=>'required|digits_between:3,8',
            'email'=>'required|email',
            'country'=>'required|in:'.implode(',',$countries),
        ];
    }
}
