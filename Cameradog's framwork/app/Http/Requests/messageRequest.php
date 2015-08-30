<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class messageRequest extends Request
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
     * Get the validation rules that apply to the request of user message.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required'
        ];
    }
}
