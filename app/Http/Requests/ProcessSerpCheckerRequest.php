<?php

namespace App\Http\Requests;

use App\Rules\ValidateCountryKeyRule;
use App\Rules\ValidateDomainNameRule;
use App\Rules\ToolsGateRule;
use Illuminate\Foundation\Http\FormRequest;

class ProcessSerpCheckerRequest extends FormRequest
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
            'keyword' => ['required', 'string', 'min:1', 'max:128', new ToolsGateRule($this->user())],
            'domain' => ['nullable', 'string', 'max:2048', new ValidateDomainNameRule()],
            'country' => ['required', new ValidateCountryKeyRule(['AX', 'BQ', 'CT', 'NQ', 'FQ', 'GG', 'IM', 'JE', 'JT', 'FX', 'MI', 'ME', 'NT', 'VD', 'PC', 'PZ', 'YD', 'BL', 'MF', 'RS', 'PU', 'SU', 'ZZ', 'WK'])],
            formatCaptchaFieldName() => config('settings.captcha_driver') ? ['required', 'captcha'] : [],
        ];
    }
}
