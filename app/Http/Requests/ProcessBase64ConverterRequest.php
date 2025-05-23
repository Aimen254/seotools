<?php

namespace App\Http\Requests;

use App\Rules\ToolsGateRule;
use Illuminate\Foundation\Http\FormRequest;

class ProcessBase64ConverterRequest extends FormRequest
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
            'content' => ['required', 'string', 'min:1', 'max:2048', new ToolsGateRule($this->user())],
            'type' => ['required', 'string', 'in:encode,decode']
        ];
    }
}
