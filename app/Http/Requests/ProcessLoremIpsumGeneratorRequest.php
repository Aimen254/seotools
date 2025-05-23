<?php

namespace App\Http\Requests;

use App\Rules\ToolsGateRule;
use Illuminate\Foundation\Http\FormRequest;

class ProcessLoremIpsumGeneratorRequest extends FormRequest
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
            'type' => ['required', 'string', 'in:paragraphs,sentences,words', new ToolsGateRule($this->user())],
            'number' => ['required', 'integer', 'min:1', 'max:500']
        ];
    }
}
