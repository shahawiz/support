<?php

namespace App\Http\Requests;
use Auth;
use PragmaRX\Countries\Package\Countries;
use Illuminate\Foundation\Http\FormRequest;
class AdminAddUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if(Auth::user()->user_role == 2 || Auth::user()->user_role ==3 ){
        //     return true;
        // }else{
        //     return false;
        // }
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
            // 'address'=>'required|string',
            // 'city'=>'required|string',
            // 'state'=>'required|string',
            // 'phone'=>'required|digits_between:6,12',
            // 'zip'=>'required|digits_between:3,8',
            'email'=>'required|email|exists:users',
            'country'=>'required|in:'.implode(',',$countries),
        ];
    }
}
