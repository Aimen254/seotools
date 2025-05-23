<?php

namespace App\Http\Requests;

use App\Rules\ToolsGateRule;
use Illuminate\Foundation\Http\FormRequest;

class ProcessUserAgentParserRequest extends FormRequest
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
            'user_agent' => ['required', 'string', 'max:512', new ToolsGateRule($this->user())]
        ];
    }
}
