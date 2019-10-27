<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentRequest extends FormRequest
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
            //
            'user_id' => 'required|unique',
            'bvn' => 'required',
            'id_front' => 'required',
            'id_back' => 'required',
            'id_no' => 'required',
            'city' => 'required',
            'street' => 'required',
            'state_id' => 'required',
        ];
    }
}
