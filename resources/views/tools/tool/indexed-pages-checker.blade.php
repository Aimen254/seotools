@section('site_title', formatTitle([__('Indexed pages checker'), __('Tool'), config('settings.title')]))

@section('head_content')
    <meta name="description" content="{{ __($tool->description) }}">
@endsection

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Indexed pages checker') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Indexed pages checker') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.indexed_pages_checker') }}" method="post" enctype="multipart/form-data" id="indexed-pages-checker-form" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
            @cannot('tools', ['App\Models\User'])
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
            @endcannot

            @csrf

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

                        <x-captcha-button form-id="indexed-pages-checker-form" class="btn {{ $errors->has(formatCaptchaFieldName()) ? 'btn-danger' : 'btn-primary' }}" data-sitekey="{{ config('settings.captcha_site_key') }}" data-theme="{{ (config('settings.dark_mode') == 1 ? 'dark' : 'light') }}">{{ __('Search') }}</x-captcha-button>

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
                    <a href="{{ route('tools.indexed_pages_checker') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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

@if(isset($result))
    <div class="card border-0 shadow-sm mt-3">
        <div class="card-header align-items-center">
            <div class="row">
                <div class="col">
                    <div class="font-weight-medium py-1">{{ __('Results') }}</div>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if(empty($result))
                {{ __('No results found.') }}
            @elseif(isset($result['error']))
                {{ $result['error']['code'] ?? null }} {{ $result['error']['message'] ?? null }}
            @else
                <div class="list-group list-group-flush my-n3">
                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-4 text-truncate text-muted">{{ __('Domain') }}</div>
                            <div class="col-12 col-lg-8 text-truncate d-flex align-items-center">
                                <img src="{{ favicon($domain) }}" rel="noreferrer" class="width-4 height-4 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">

                                <span dir="ltr">{{ $domain }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-4 text-truncate text-muted">{{ __('Status') }}</div>
                            <div class="col-12 col-lg-8 text-truncate d-flex align-items-center">
                                @if($result['searchInformation']['totalResults'] > 0)
                                    <div class="bg-success width-4 height-4 rounded-circle {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}"></div>

                                    <div class="text-truncate">{{ __('Indexed') }}</div>
                                @else
                                    <div class="bg-danger width-4 height-4 rounded-circle {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}"></div>

                                    <div class="text-truncate">{{ __('Not indexed') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Pages') }}</div>
                            <div class="col-12 col-lg-8 text-break">≈{{ number_format($result['searchInformation']['totalResults'], 0, __('.'), __(',')) }}</div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif
