@section('site_title', formatTitle([__('SERP checker'), __('Tool'), config('settings.title')]))

@section('head_content')
    <meta name="description" content="{{ __($tool->description) }}">
@endsection

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('SERP checker') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('SERP checker') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.serp_checker') }}" method="post" enctype="multipart/form-data" id="serp-checker-form" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
            @cannot('tools', ['App\Models\User'])
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
            @endcannot

            @csrf

            <div class="form-group">
                <label for="i-keyword">{{ __('Keyword') }}</label>
                <input type="text" name="keyword" id="i-keyword" class="form-control{{ $errors->has('keyword') ? ' is-invalid' : '' }}" value="{{ $keyword ?? (old('keyword') ?? '') }}">

                @if ($errors->has('keyword'))
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first('keyword') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="i-domain">{{ __('Domain') }}</label>
                <input type="text" dir="ltr" name="domain" id="i-domain" class="form-control{{ $errors->has('domain') ? ' is-invalid' : '' }}" value="{{ $domain ?? (old('domain') ?? '') }}">

                @if ($errors->has('domain'))
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first('domain') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="i-country">{{ __('Country') }}</label>
                <select name="country" id="i-country" class="custom-select{{ $errors->has('country') ? ' is-invalid' : '' }}">
                    <option value="" hidden disabled selected>{{ __('Country') }}</option>
                    @foreach(array_diff_key(config('countries'), array_flip(['AX', 'BQ', 'CT', 'NQ', 'FQ', 'GG', 'IM', 'JE', 'JT', 'FX', 'MI', 'ME', 'NT', 'VD', 'PC', 'PZ', 'YD', 'BL', 'MF', 'RS', 'PU', 'SU', 'ZZ', 'WK'])) as $key => $value)
                        <option value="{{ $key }}" @if ((isset($country) && $country == $key) || (!isset($country) && old('country') !== null && old('country') == $key) || (!isset($country) && config('settings.gcs_country') == $key && old('country') == null)) selected @endif>{{ __($value) }}</option>
                    @endforeach
                </select>
                @if ($errors->has('country'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('country') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    @if(config('settings.captcha_driver'))
                        <x-captcha-js lang="{{ __('lang_code') }}"></x-captcha-js>

                        <x-captcha-button form-id="serp-checker-form" class="btn {{ $errors->has(formatCaptchaFieldName()) ? 'btn-danger' : 'btn-primary' }}" data-sitekey="{{ config('settings.captcha_site_key') }}" data-theme="{{ (config('settings.dark_mode') == 1 ? 'dark' : 'light') }}">{{ __('Search') }}</x-captcha-button>

                        @if ($errors->has(formatCaptchaFieldName()))
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ __($errors->first(formatCaptchaFieldName())) }}</strong>
                            </span>
                        @endif
                    @else
                        <button type="submit" name="submit" class="btn btn-primary">{{ __('Search') }}</button>
                    @endif
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.serp_checker') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
                </div>
            </div>
        </form>

        @cannot('tools', ['App\Models\User'])
            <div class="position-absolute top-0 right-0 bottom-0 left-0">
                @if(paymentProcessors())
                    @include('shared.features.locked')
                @else
                    @include('shared.features.unavailable')
                @endif
            </div>
        @endcannot
    </div>
</div>

@if(isset($results))
    <div class="card border-0 shadow-sm mt-3">
        <div class="card-header align-items-center">
            <div class="row">
                <div class="col">
                    <div class="font-weight-medium py-1">{{ __('Results') }}</div>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if(empty($results) || isset($results['items']) == false)
                {{ __('No results found.') }}
            @elseif(isset($results['error']))
                {{ $results['error']['code'] ?? null }} {{ $results['error']['message'] ?? null }}
            @else
                <div class="list-group list-group-flush my-n3">
                    <div class="list-group-item px-0 text-muted">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center">
                                        <div class="flex-shrink-0 width-8 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">#</div>
                                        {{ __('URL') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($results['items'] as $result)
                        <div class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col text-truncate">
                                    <div class="row text-truncate">
                                        <div class="col-12 d-flex text-truncate">
                                            <div class="text-truncate">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 width-8 {{ ($domain ? (Str::contains($result['link'], $domain) ? 'text-dark font-weight-medium' : 'text-secondary') : 'text-dark') }}">{{ ($loop->index + 1) }}</div>

                                                    <img src="{{ favicon($result['link']) }}" rel="noreferrer" class="flex-shrink-0 width-4 height-4 mx-3">

                                                    <div class="text-truncate">
                                                        <a href="{{ $result['link'] }}" class="{{ ($domain ? (Str::contains($result['link'], $domain) ? 'text-dark font-weight-medium' : 'text-secondary') : 'text-dark') }}" dir="ltr" rel="nofollow noreferrer noopener" target="_blank">{{ str_replace(['http://', 'https://'], '', $result['link']) }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="btn btn-sm btn-outline-primary" data-tooltip-copy="true" data-clipboard-copy="{{ $result['link'] }}" title="{{ __('Copy') }}" data-text-copy="{{ __('Copy') }}" data-text-copied="{{ __('Copied') }}">{{ __('Copy') }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endif
