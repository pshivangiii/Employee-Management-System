<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
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
            // 'email' => 'required|max:50',
            // 'psw' =>  'required|min:6|max:15',
            // 'team' => 'required|max:20|min:1',
            // 'designation' =>'required|max:20|min:1',
            'pending_requests' =>'required|max:300|min:1',
            'approved_requests' =>'required|max:300|min:1'
        ];
    }
}
