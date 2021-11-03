<?php

namespace App\Http\Requests\API;

use App\Models\Jemaat_v1;
use InfyOm\Generator\Request\APIRequest;

class UpdateJemaat_v1APIRequest extends APIRequest
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
        $rules = Jemaat_v1::$rules;
        
        return $rules;
    }
}
