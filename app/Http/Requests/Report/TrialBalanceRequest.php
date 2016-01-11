<?php

namespace App\Http\Requests\Report;

use App\Http\Requests\Request;

class TrialBalanceRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'from' => 'date',
            'to' => 'date',
        ];
    }
}
