@section('site_title', formatTitle([config('settings.title'), __(config('settings.tagline'))]))

@extends('layouts.app')

@section('head_content')

@endsection

@section('content')
<div class="flex-fill">
    <div class="bg-base-0 position-relative pt-5 pt-sm-6">
        <div class="container position-relative py-sm-5 z-1">
            <h1 class="display-4 text-center text-break font-weight-bold mb-0">
                {{ __('Professional SEO reports and tools') }}
            </h1>

            <p class="text-muted text-center text-break font-size-xl font-weight-normal mt-4 mb-5">
                {{ __('Identify technical SEO issues and take action to improve the health and performance of your website.') }}
            </p>

            <div class="row justify-content-md-center m-n2">
                @if(config('settings.report_guest'))
                    <div class="col-12 col-lg-8 p-2">
                        <div class="form-group mb-0" id="report-form-container">
                            <form action="{{ route('guest') }}" method="post" enctype="multipart/form-data" id="report-form">
                                @csrf

                                @if(old('url'))
                                    @include('shared.message')
                                @endif

                                <div class="form-row">
                                    <div class="col-12 col-sm">
                                        <input type="text" dir="ltr" autocomplete="off" autocapitalize="none" spellcheck="false" name="url" class="form-control form-control-lg font-size-lg{{ $errors->has('url') || $errors->has(formatCaptchaFieldName()) ? ' is-invalid' : '' }}" placeholder="https://example.com" value="{{ old('url') }}" autofocus>
                                    </div>
                                    <div class="col-12 col-sm-auto">
                                        @if(config('settings.captcha_driver'))
                                            <x-captcha-js lang="{{ __('lang_code') }}"></x-captcha-js>

                                            <x-captcha-button form-id="report-form" class="btn btn-primary btn-lg btn-block font-size-lg mt-3 mt-sm-0" data-sitekey="{{ config('settings.captcha_site_key') }}" data-theme="{{ (config('settings.dark_mode') == 1 ? 'dark' : 'light') }}">{{ __('Analyze') }}</x-captcha-button>
                                        @else
                                            <button class="btn btn-primary btn-lg btn-block font-size-lg mt-3 mt-sm-0" type="submit" data-button-loader>
                                                <div class="position-absolute top-0 right-0 bottom-0 left-0 d-flex align-items-center justify-content-center">
                                                    <span class="d-none spinner-border spinner-border-sm width-4 height-4" role="status"></span>
                                                </div>
                                                <span class="spinner-text">{{ __('Analyze') }}</span>&#8203;
                                            </button>
                                        @endif
                                    </div>
                                    @if ($errors->has('url'))
                                        <div class="col-12">
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('url') }}</strong>
                                            </span>
                                        </div>
                                    @endif

                                    @if ($errors->has(formatCaptchaFieldName()))
                                        <div class="col-12">
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ __($errors->first(formatCaptchaFieldName())) }}</strong>
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="col-12 col-md-auto p-2">
                        @if(config('settings.demo_url'))
                            <a href="{{ config('settings.demo_url') }}" target="_blank" class="btn btn-outline-primary btn-lg btn-block font-size-lg d-inline-flex align-items-center justify-content-center">{{ __('Demo') }} @include('icons.external', ['class' => 'fill-current width-3 height-3 ' . (__('lang_dir') == 'rtl' ? 'mr-2' : 'ml-2')])</a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="scroll-margin-top-18" id="features"></div>
    <div class="bg-base-0">
        <div class="container position-relative py-5 py-md-7 d-flex flex-column z-1 " style="padding-top: 0px !important">
            <h2 class="h2 mb-3 font-weight-bold text-center">{{ __('Tools') }}</h2>
            <div class="m-auto text-center">
                <p class="text-muted font-weight-normal font-size-lg mb-0">{{ __('Over :number web tools and utilities.', ['number' => floor(count($tools) / 10) * 10]) }}</p>
            </div>

            <div class="row position-relative">
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
                @foreach((config('settings.tools_guest') ? $tools->take(16) : $tools->take(20)) as $tool)
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mt-4 mt-sm-5 @if($loop->index > 6) d-none d-sm-flex @endif">
                        <div class="d-flex align-items-center">
                            <div class="d-flex position-relative text-primary width-8 height-8 align-items-center justify-content-center flex-shrink-0 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">
                                <div class="position-absolute bg-primary opacity-10 top-0 right-0 bottom-0 left-0 border-radius-lg"></div>
                                @include('icons.' . $tool['icon'], ['class' => 'fill-current width-4 height-4'])
                            </div>
                            <div>
                                <div class="d-block w-100"><div class="d-inline-block font-weight-bold">{{ __($tool['name']) }}</div></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if(config('settings.tools_guest'))
                <div class="text-center"><a href="{{ route('tools') }}" class="btn btn-outline-primary btn-lg font-size-lg mt-5">{{ __('View all') }}</a></div>
            @endif
        </div>
        <div class="row justify-content-center align-items-center mb-2">
            <div class="col-12 col-md-auto p-2 text-center">
                <a href="{{ route('tools') }}" class="btn btn-primary btn-lg btn-block font-size-lg d-inline-flex align-items-center justify-content-center">{{ __('View All') }}</a>
            </div>
        </div>
    </div>
    <div class="bg-base-1 overflow-hidden">
        <div class="container py-5 py-md-7 position-relative z-1">
            <div class="row mx-n5">
                <div class="col-12 col-lg-6 px-5 order-1 order-lg-2">
                    <div class="row">
                        <div class="col-12 text-center {{ (__('lang_dir') == 'rtl' ? 'text-lg-right' : 'text-lg-left') }}">
                            <h2 class="h2 mb-3 font-weight-bold">{{ __('Advanced reports') }}</h2>
                            <div class="m-auto">
                                <p class="text-muted font-weight-normal font-size-lg mb-0">
                                    {{ __('Detailed reports that enables you to take actions on issues that actually matter.') }}
                                </p>
                            </div>
                        </div>

                        <div class="col-12 pt-4 mt-4">
                            <div class="d-flex flex-row">
                                <div class="d-flex width-12 height-12 position-relative align-items-center justify-content-center flex-shrink-0 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">
                                    <div class="position-absolute bg-primary opacity-10 top-0 right-0 bottom-0 left-0 border-radius-xl"></div>
                                    @include('icons.search', ['class' => 'fill-current width-6 height-6 text-primary'])
                                </div>
                                <div class="{{ (__('lang_dir') == 'rtl' ? 'mr-1' : 'ml-1') }}">
                                    <div class="d-block w-100"><div class="h5 mt-0 mb-1 d-inline-block font-weight-bold">{{ __('SEO') }}</div></div>
                                    <div class="d-block w-100 text-muted">{{ __('Get an in-depth analysis on the most important tags and the content of your webpage.') }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 pt-4 mt-4">
                            <div class="d-flex flex-row">
                                <div class="d-flex width-12 height-12 position-relative align-items-center justify-content-center flex-shrink-0 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">
                                    <div class="position-absolute bg-primary opacity-10 top-0 right-0 bottom-0 left-0 border-radius-xl"></div>
                                    @include('icons.speed', ['class' => 'fill-current width-6 height-6 text-primary'])
                                </div>
                                <div class="{{ (__('lang_dir') == 'rtl' ? 'mr-1' : 'ml-1') }}">
                                    <div class="d-block w-100"><div class="h5 mt-0 mb-1 d-inline-block font-weight-bold">{{ __('Performance') }}</div></div>
                                    <div class="d-block w-100 text-muted">{{ __('Improve the performance of your webpage\'s with key metrics and suggestions.') }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 pt-4 mt-4">
                            <div class="d-flex flex-row">
                                <div class="d-flex width-12 height-12 position-relative align-items-center justify-content-center flex-shrink-0 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">
                                    <div class="position-absolute bg-primary opacity-10 top-0 right-0 bottom-0 left-0 border-radius-xl"></div>
                                    @include('icons.health-and-guard', ['class' => 'fill-current width-6 height-6 text-primary'])
                                </div>
                                <div class="{{ (__('lang_dir') == 'rtl' ? 'mr-1' : 'ml-1') }}">
                                    <div class="d-block w-100"><div class="h5 mt-0 mb-1 d-inline-block font-weight-bold">{{ __('Security') }}</div></div>
                                    <div class="d-block w-100 text-muted">{{ __('Obtain privacy and security information to keep your webpage\'s health in good standing.') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 px-5 position-relative order-2 order-lg-1 mt-5 mt-lg-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="position-relative">
                                <div class="position-absolute top-0 right-0 bottom-0 left-0 bg-primary opacity-10 border-radius-xl" style="transform: translate(-1rem, 1rem);"></div>

                                <div class="card border-0 shadow-lg border-radius-xl overflow-hidden cursor-default">
                                    <div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col text-truncate">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="width-4 height-4 fill-current flex-shrink-0 d-flex align-items-center justify-content-center {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">
                                                                    @include('icons.checkmark', ['class' => 'width-4 height-4 fill-current flex-shrink-0 text-success'])
                                                                </div>

                                                                <div class="text-truncate font-weight-medium">{{ __('Title') }}</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-6">
                                                            <div class="text-truncate">
                                                                {{ __('The title tag is perfect.') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-auto d-flex align-items-center">
                                                    @include('icons.info', ['class' => 'fill-current width-4 height-4 text-secondary'])&ZeroWidthSpace;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-0 shadow-lg border-radius-xl overflow-hidden cursor-default mt-3">
                                    <div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col text-truncate">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="width-4 height-4 fill-current flex-shrink-0 d-flex align-items-center justify-content-center {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">
                                                                    @include('icons.triangle', ['class' => 'width-4 height-4 fill-current flex-shrink-0 text-danger'])
                                                                </div>

                                                                <div class="text-truncate font-weight-medium">{{ __('Meta description') }}</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-6">
                                                            <div class="text-truncate">
                                                                {{ __('The meta description tag is missing or empty.') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-auto d-flex align-items-center">
                                                    @include('icons.info', ['class' => 'fill-current width-4 height-4 text-secondary'])&ZeroWidthSpace;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-0 shadow-lg border-radius-xl overflow-hidden cursor-default mt-3">
                                    <div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col text-truncate">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="width-4 height-4 fill-current flex-shrink-0 d-flex align-items-center justify-content-center {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">
                                                                    @include('icons.checkmark', ['class' => 'width-4 height-4 fill-current flex-shrink-0 text-success'])
                                                                </div>

                                                                <div class="text-truncate font-weight-medium">{{ __('Load time') }}</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-6">
                                                            <div class="text-truncate">
                                                                {{ __('The webpage loaded in :value seconds.', ['value' => number_format(0.02, 2, __('.'), __(','))]) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-auto d-flex align-items-center">
                                                    @include('icons.info', ['class' => 'fill-current width-4 height-4 text-secondary'])&ZeroWidthSpace;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-0 shadow-lg border-radius-xl overflow-hidden cursor-default mt-3">
                                    <div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col text-truncate">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="width-4 height-4 fill-current flex-shrink-0 d-flex align-items-center justify-content-center {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">
                                                                    @include('icons.square', ['class' => 'width-4 height-4 fill-current flex-shrink-0 text-warning'])
                                                                </div>

                                                                <div class="text-truncate font-weight-medium">{{ __('Structured data') }}</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-6">
                                                            <div class="text-truncate">
                                                                {{ __('There are no structured data tags on the webpage.') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-auto d-flex align-items-center">
                                                    @include('icons.info', ['class' => 'fill-current width-4 height-4 text-secondary'])&ZeroWidthSpace;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-0 shadow-lg border-radius-xl overflow-hidden cursor-default mt-3">
                                    <div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col text-truncate">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="width-4 height-4 fill-current flex-shrink-0 d-flex align-items-center justify-content-center {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">
                                                                    @include('icons.circle', ['class' => 'width-4 height-4 fill-current flex-shrink-0 text-secondary'])
                                                                </div>

                                                                <div class="text-truncate font-weight-medium">{{ __('JavaScript defer') }}</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-6">
                                                            <div class="text-truncate">
                                                                {{ __('There are :value javascript resources without the defer attribute.', ['value' => number_format(10, 0, __('.'), __(','))]) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-auto d-flex align-items-center">
                                                    @include('icons.info', ['class' => 'fill-current width-4 height-4 text-secondary'])&ZeroWidthSpace;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-0 shadow-lg border-radius-xl overflow-hidden cursor-default mt-3">
                                    <div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col text-truncate">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="width-4 height-4 fill-current flex-shrink-0 d-flex align-items-center justify-content-center {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">
                                                                    @include('icons.checkmark', ['class' => 'width-4 height-4 fill-current flex-shrink-0 text-success'])
                                                                </div>

                                                                <div class="text-truncate font-weight-medium">{{ __('Content length') }}</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-6">
                                                            <div class="text-truncate">
                                                                {{ __('The webpage has :value words.', ['value' => number_format(2995, 0, __('.'), __(','))]) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-auto d-flex align-items-center">
                                                    @include('icons.info', ['class' => 'fill-current width-4 height-4 text-secondary'])&ZeroWidthSpace;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(paymentProcessors())
        <div class="bg-base-1">
            <div class="container py-5 py-md-7 position-relative z-1">
                <div class="text-center">
                    <h2 class="h2 mb-3 font-weight-bold text-center">{{ __('Pricing') }}</h2>
                    <div class="m-auto">
                        <p class="text-muted font-weight-normal font-size-lg mb-0">{{ __('Simple pricing plans for everyone and every budget.') }}</p>
                    </div>
                </div>

                @include('shared.pricing')

                <div class="d-flex justify-content-center">
                    <a href="{{ route('pricing') }}" class="btn btn-outline-primary py-2 mt-5">{{ __('Learn more') }}<span class="sr-only"> {{ mb_strtolower(__('Pricing')) }}</span></a>
                </div>
            </div>
        </div>
    
    @endif
</div>
@endsection
