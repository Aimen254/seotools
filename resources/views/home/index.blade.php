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
                        <a href="{{ config('settings.registration') ? route('register') : route('login') }}" class="btn btn-primary btn-lg btn-block font-size-lg d-inline-flex align-items-center justify-content-center">{{ __('Get started') }}</a>
                    </div>
                    <div class="col-12 col-md-auto p-2">
                        @if(config('settings.demo_url'))
                            <a href="{{ config('settings.demo_url') }}" target="_blank" class="btn btn-outline-primary btn-lg btn-block font-size-lg d-inline-flex align-items-center justify-content-center">{{ __('Demo') }} @include('icons.external', ['class' => 'fill-current width-3 height-3 ' . (__('lang_dir') == 'rtl' ? 'mr-2' : 'ml-2')])</a>
                        @else
                            <a href="#features" class="btn btn-outline-primary btn-lg btn-block font-size-lg d-inline-flex align-items-center justify-content-center">{{ __('Learn more') }}</a>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="position-relative z-0 mt-5 mt-sm-0">
            <div class="container">
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 d-flex flex-column">
                    <div class="flex-grow-1"></div>
                    <div class="flex-grow-1"></div>
                    <div class="flex-grow-1"></div>
                    <div class="flex-grow-1 bg-fade-0"></div>
                </div>

                <div class="position-relative">
                    <div class="position-absolute top-0 left-4 bottom-0 right-4 bg-primary opacity-10 border-radius-xl" style="transform: translate(0, -1rem);"></div>
                    <img src="{{ (config('settings.dark_mode') == 1 ? asset('img/hero-dark.png') : asset('img/hero.png')) }}" class="position-relative img-fluid shadow-lg border-top-left-radius-xl border-top-right-radius-xl image-rendering-optimize-contrast" data-theme-dark="{{ asset('img/hero-dark.png') }}" data-theme-light="{{ asset('img/hero.png') }}" width="1512" height="700" data-theme-target="src" alt="{{ config('settings.title') }}">
                </div>
            </div>
        </div>

        <div class="bg-base-0 container position-relative pt-5 pb-5 pb-md-7 z-1 overflow-hidden">
            <div class="row m-n4 m-lg-n5">
                <div class="col-12 col-lg-4 p-4 p-lg-5 d-flex">
                    <div class="d-flex position-relative text-primary width-4 height-4 align-items-center justify-content-center flex-shrink-0 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }} mt-1">
                        @include('icons.list-alt', ['class' => 'fill-current width-4 height-4'])
                    </div>
                    <div>
                        <div class="d-block w-100 d-inline-block">
                            <span class="font-weight-bold">
                                {{ __('Reports') }}.
                            </span>
                            <span class="text-muted">
                                {{ __('SEO, performance, and security tests.') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 p-4 p-lg-5 d-flex">
                    <div class="d-flex position-relative text-primary width-4 height-4 align-items-center justify-content-center flex-shrink-0 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }} mt-1">
                        @include('icons.account-tree', ['class' => 'fill-current width-4 height-4'])
                    </div>
                    <div>
                        <div class="d-block w-100 d-inline-block">
                            <span class="font-weight-bold">
                                {{ __('Projects') }}.
                            </span>
                            <span class="text-muted">
                                {{ __('Automatically organized report results.') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 p-4 p-lg-5 d-flex">
                    <div class="d-flex position-relative text-primary width-4 height-4 align-items-center justify-content-center flex-shrink-0 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }} mt-1">
                        @include('icons.handyman', ['class' => 'fill-current width-4 height-4'])
                    </div>
                    <div>
                        <div class="d-block w-100 d-inline-block">
                            <span class="font-weight-bold">
                                {{ __('Tools') }}.
                            </span>
                            <span class="text-muted">
                                {{ __('Research, development, and content instruments.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-margin-top-18" id="features"></div>

    <div class="bg-base-1">
        <div class="container position-relative text-center py-5 py-md-7 d-flex flex-column z-1">
            <h2 class="h2 mb-3 font-weight-bold text-center">{{ __('Ranking improvement') }}</h2>
            <div class="m-auto text-center">
                <p class="text-muted font-weight-normal font-size-lg mb-0">{{ __('Reports that help you improve your presence on all major search engines.') }}</p>
            </div>

            <div class="d-flex flex-wrap justify-content-center justify-content-lg-between mt-4 mx-n3">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-dark height-8 mx-3 mt-4" viewBox="0 0 269.64 88.76"><path d="M115.39,46.71a22.25,22.25,0,0,1-44.5,0,22.25,22.25,0,0,1,44.5,0Zm-9.74,0c0-8-5.79-13.44-12.51-13.44S80.63,38.73,80.63,46.71s5.79,13.44,12.51,13.44S105.65,54.6,105.65,46.71Z"/><path d="M163.39,46.71a22.25,22.25,0,0,1-44.5,0,22.25,22.25,0,0,1,44.5,0Zm-9.74,0c0-8-5.79-13.44-12.51-13.44s-12.51,5.46-12.51,13.44,5.79,13.44,12.51,13.44S153.65,54.6,153.65,46.71Z"/><path d="M209.39,25.87V65.69c0,16.38-9.66,23.07-21.08,23.07a21.12,21.12,0,0,1-19.66-13.07l8.48-3.53c1.51,3.61,5.21,7.87,11.17,7.87,7.31,0,11.84-4.51,11.84-13V63.84h-.34a15.1,15.1,0,0,1-11.68,5c-11.09,0-21.25-9.66-21.25-22.09S177,24.53,188.12,24.53a15.37,15.37,0,0,1,11.68,5h.34V25.88h9.25Zm-8.56,20.92c0-7.81-5.21-13.52-11.84-13.52S176.64,39,176.64,46.79,182.27,60.15,189,60.15,200.83,54.52,200.83,46.79Z"/><path d="M224.64,2.53v65h-9.5v-65Z"/><path d="M261.66,54l7.56,5a22.08,22.08,0,0,1-18.48,9.83c-12.6,0-22-9.74-22-22.18,0-13.19,9.49-22.18,20.92-22.18s17.14,9.16,19,14.11l1,2.52L240,53.43c2.27,4.45,5.8,6.72,10.75,6.72s8.4-2.44,10.92-6.14Zm-23.27-8,19.82-8.23c-1.09-2.77-4.37-4.7-8.23-4.7A12.17,12.17,0,0,0,238.39,46Z"/><path d="M34.93,40.94V31.53H66.64a31.18,31.18,0,0,1,.47,5.68c0,7.06-1.93,15.79-8.15,22-6.05,6.3-13.78,9.66-24,9.66C16,68.88,0,53.42,0,34.44S16,0,34.94,0a32.82,32.82,0,0,1,23.6,9.49L51.9,16.13a24,24,0,0,0-17-6.72,24.7,24.7,0,0,0-24.7,25,24.7,24.7,0,0,0,24.7,25c9,0,14.11-3.61,17.39-6.89,2.66-2.66,4.41-6.46,5.1-11.65Z"/></svg>

                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-dark height-8 mx-3 mt-4" viewBox="0 0 91.05 27.94"><path d="M11.35.64H0V12H11.35Z"/><path d="M23.88.64H12.53V12H23.88Z"/><path d="M11.35,13.17H0V24.52H11.35Z"/><path d="M23.88,13.17H12.53V24.52H23.88Z"/><path d="M42.54.79V11.41H40.7V3.09h0l-3.28,8.32H36.15L32.77,3.09h0v8.32H31V.79h2.65l3,7.87h.05L40,.79Zm1.54.81A1,1,0,0,1,44.4.86a1.1,1.1,0,0,1,.77-.3,1.07,1.07,0,0,1,1.1,1h0a1,1,0,0,1-.32.74,1.15,1.15,0,0,1-.78.3,1.06,1.06,0,0,1-.77-.31.94.94,0,0,1-.32-.73Zm2,2.2v7.61h-1.8V3.8Zm5.44,6.31a2.5,2.5,0,0,0,.87-.18,3.64,3.64,0,0,0,.89-.49V11.1a3.25,3.25,0,0,1-1,.37,5.44,5.44,0,0,1-1.2.13,3.6,3.6,0,0,1-3.78-3.78,4.31,4.31,0,0,1,1.07-3,3.89,3.89,0,0,1,3-1.19A4.18,4.18,0,0,1,53.27,4V5.76a3.36,3.36,0,0,0-.85-.47,2.42,2.42,0,0,0-.88-.17,2.23,2.23,0,0,0-1.71.69,2.62,2.62,0,0,0-.66,1.86,2.51,2.51,0,0,0,.63,1.8,2.28,2.28,0,0,0,1.71.64Zm6.87-6.44a1.89,1.89,0,0,1,.67.11V5.59A1.88,1.88,0,0,0,58,5.3a1.39,1.39,0,0,0-1.12.56,2.74,2.74,0,0,0-.45,1.7v3.86h-1.8V3.79h1.8V5h0a2.16,2.16,0,0,1,.75-1,1.94,1.94,0,0,1,1.18-.35Zm.77,4.05a4.11,4.11,0,0,1,1.07-3,3.91,3.91,0,0,1,3-1.11A3.68,3.68,0,0,1,66,4.68a4,4,0,0,1,1,2.88,4,4,0,0,1-1.07,2.94A3.86,3.86,0,0,1,63,11.6a3.81,3.81,0,0,1-2.81-1A3.83,3.83,0,0,1,59.14,7.72ZM61,7.66a2.73,2.73,0,0,0,.54,1.82,1.89,1.89,0,0,0,1.55.63,1.8,1.8,0,0,0,1.48-.63,2.88,2.88,0,0,0,.52-1.86,2.84,2.84,0,0,0-.53-1.86,2.08,2.08,0,0,0-3,0A2.82,2.82,0,0,0,61,7.66ZM69.63,5.8a.76.76,0,0,0,.24.61A4.32,4.32,0,0,0,71,7a3.69,3.69,0,0,1,1.5,1,2,2,0,0,1,.43,1.3A2.1,2.1,0,0,1,72.07,11a3.48,3.48,0,0,1-2.23.65,5.22,5.22,0,0,1-2-.41V9.43a4.6,4.6,0,0,0,1.06.54,2.87,2.87,0,0,0,1,.2,1.89,1.89,0,0,0,.9-.17.61.61,0,0,0,.28-.57.82.82,0,0,0-.29-.63,4.76,4.76,0,0,0-1.14-.59,3.55,3.55,0,0,1-1.41-.93A2,2,0,0,1,67.81,6a2.07,2.07,0,0,1,.82-1.69,3.25,3.25,0,0,1,2.13-.67,5.05,5.05,0,0,1,1.72.33v1.7a4,4,0,0,0-.83-.42A3,3,0,0,0,70.71,5a1.43,1.43,0,0,0-.79.2.67.67,0,0,0-.3.56Zm4,1.92a4.11,4.11,0,0,1,1.07-3,3.93,3.93,0,0,1,3-1.11,3.68,3.68,0,0,1,2.79,1.06,4,4,0,0,1,1,2.88,4,4,0,0,1-1.07,2.94,3.89,3.89,0,0,1-2.89,1.1,3.83,3.83,0,0,1-2.82-1A3.83,3.83,0,0,1,73.66,7.72Zm1.87-.06a2.73,2.73,0,0,0,.54,1.82,1.9,1.9,0,0,0,1.56.63,1.8,1.8,0,0,0,1.48-.63,2.88,2.88,0,0,0,.52-1.86,2.84,2.84,0,0,0-.54-1.86,1.84,1.84,0,0,0-1.48-.63,1.89,1.89,0,0,0-1.53.66A2.79,2.79,0,0,0,75.53,7.66Zm11.9-2.39H84.77v6.15H83V5.27H81.67V3.8H83V2.74A2.64,2.64,0,0,1,85.49,0h.24a4.8,4.8,0,0,1,.58,0,2.21,2.21,0,0,1,.44.1V1.69a1.9,1.9,0,0,0-.81-.2,1.13,1.13,0,0,0-.88.35,1.57,1.57,0,0,0-.29,1v.93h2.66V2.09l1.8-.54V3.81h1.82V5.27H89.23V8.82a1.55,1.55,0,0,0,.26,1,1,1,0,0,0,.8.28,1.71,1.71,0,0,0,.76-.25v1.48a1.73,1.73,0,0,1-.56.18,4.23,4.23,0,0,1-.79.08A2.24,2.24,0,0,1,88,11a2.59,2.59,0,0,1-.56-1.82V5.27Z"/><path d="M31,24.41V13.9h3.34a3.9,3.9,0,0,1,2.41.67,2,2,0,0,1,.89,1.73,2.53,2.53,0,0,1-.5,1.56,2.72,2.72,0,0,1-1.4.93v0a2.71,2.71,0,0,1,1.72.81,2.42,2.42,0,0,1,.66,1.76,2.65,2.65,0,0,1-1.06,2.18,4.28,4.28,0,0,1-2.69.84Zm1.74-9.11v3h1.13a2.22,2.22,0,0,0,1.42-.42,1.51,1.51,0,0,0,.52-1.22q0-1.35-1.8-1.35Zm0,4.39V23h1.48a2.3,2.3,0,0,0,1.51-.44,1.58,1.58,0,0,0,.53-1.25c0-1.09-.75-1.63-2.26-1.63Zm7.5-4.36a1,1,0,0,1-.71-.27.88.88,0,0,1-.29-.69.91.91,0,0,1,.29-.7,1,1,0,0,1,.72-.27,1.06,1.06,0,0,1,.73.27.93.93,0,0,1,.29.7.89.89,0,0,1-.29.68,1,1,0,0,1-.74.28Zm.85,9.08h-1.7V16.9h1.71Zm8.41,0h-1.7V20.18c0-1.41-.49-2.1-1.48-2.1a1.64,1.64,0,0,0-1.29.59,2.16,2.16,0,0,0-.5,1.46v4.28H42.86V16.9h1.71v1.25h0A2.65,2.65,0,0,1,47,16.73a2.25,2.25,0,0,1,1.87.8,3.53,3.53,0,0,1,.64,2.29Zm8.41-.6c0,2.75-1.37,4.12-4.15,4.12a6,6,0,0,1-2.55-.49V25.89a4.68,4.68,0,0,0,2.33.7A2.35,2.35,0,0,0,56.26,24v-.81h0a3,3,0,0,1-4.75.43,4.07,4.07,0,0,1-.83-2.69,4.7,4.7,0,0,1,.9-3A3,3,0,0,1,54,16.73a2.39,2.39,0,0,1,2.2,1.21h0v-1H58ZM56.27,21V20a1.93,1.93,0,0,0-.52-1.35,1.73,1.73,0,0,0-1.31-.57,1.81,1.81,0,0,0-1.51.72,3.23,3.23,0,0,0-.55,2,2.84,2.84,0,0,0,.52,1.77,1.68,1.68,0,0,0,1.39.66,1.81,1.81,0,0,0,1.43-.63A2.4,2.4,0,0,0,56.27,21Z"/></svg>

                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-dark height-8 mx-3 mt-4" viewBox="0 0 1000 277.32"><path d="M0,67.51H59.49l34.65,88.63,35.09-88.63h57.92L99.93,277.32H41.64l23.87-55.59Z"/><path d="M247.5,64c-44.7,0-73,40.09-73,80,0,44.93,31,80.55,72.11,80.55,30.68,0,42.25-18.7,42.25-18.7V220.4h51.89V67.51H288.9v13.9S276,64,247.5,64Zm11,49.14c20.62,0,31.26,16.32,31.26,31,0,15.86-11.4,31.42-31.26,31.42-16.47,0-31.35-13.45-31.35-30.74C227.19,127.3,239.16,113.12,258.54,113.12Z"/><path d="M358.66,220.4V0h54.27V81.94S425.82,64,452.82,64c33,0,52.38,24.61,52.38,59.77V220.4H451.32V137c0-11.9-5.67-23.4-18.51-23.4-13.07,0-19.88,11.67-19.88,23.4V220.4Z"/><path d="M597.73,64c-51.19,0-81.67,38.93-81.67,80.63,0,47.46,36.91,79.91,81.87,79.91,43.57,0,81.7-31,81.7-79.11C679.63,92.76,639.71,64,597.73,64Zm.49,49.57c18.08,0,30.59,15.06,30.59,31.12,0,13.7-11.65,30.59-30.59,30.59-17.35,0-30.37-13.92-30.37-30.74C567.85,128.33,578.68,113.57,598.22,113.57Z"/><path d="M770.05,64c-51.19,0-81.67,38.93-81.67,80.63,0,47.46,36.91,79.91,81.86,79.91,43.58,0,81.71-31,81.71-79.11C852,92.76,812,64,770.05,64Zm.49,49.57c18.08,0,30.59,15.06,30.59,31.12,0,13.7-11.66,30.59-30.59,30.59-17.35,0-30.37-13.92-30.37-30.74C740.17,128.33,751,113.57,770.54,113.57Z"/><circle cx="894.78" cy="187.61" r="36.04"/><path d="M942.66,138.33H877.78L935.36,0H1000Z"/></svg>

                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-dark height-8 mx-3 mt-4" viewBox="0 0 697.4 167.92"><path d="M639.84,125.05l-24.13,40.49h-28.9l37.74-62.41-36.3-57.4h32l22.93,36.2,20.54-36.2h28.42l-33.91,58.12,39.17,61.69h-32Zm-128-30.25h39.65V92.42c0-15-4.3-26.68-18.39-26.68-13.62,0-20.54,10-21.26,29.06m27.47,73.12c-36.31,0-56.85-20.25-56.85-61.93,0-36.2,16.48-62.64,51.11-62.64,28.43,0,46.82,15.72,46.82,57.4v15H511.82c1.2,20,9.08,29.77,29.86,29.77,13.85,0,28.66-5.24,37.49-11.19v23.1c-8.35,5.71-21.73,10.48-39.88,10.48M388.58,106.47c0,27.15,7.65,39.06,23.17,39.06,16,0,24.12-12.15,24.12-40,0-27.63-7.64-39.78-22.93-39.78-16.24,0-24.36,12.38-24.36,40.73m-29.37,0c0-40,19.1-63.12,46.57-63.12,12.42,0,22.93,5.72,30.09,16.43V0h28.42V165.54H438l-1.43-15.48c-7.64,11.67-18.63,17.86-32,17.86-26.75,0-45.37-21.91-45.37-61.45m-86,59.07H244.8V45.73h27.71l.72,10h1.43c5.73-5.71,15.76-11.9,32.72-11.9,23.17,0,32.72,10.48,32.72,34.29v87.42H311.68V81c0-9-4.54-13.34-14.57-13.34-10.27,0-18.63,5.48-23.88,11.91Zm-80-56h-4.06c-24.37,0-34.16,5-34.16,19.06,0,10.72,6,17.86,17.92,17.86,10,0,16.71-4.29,20.3-9.53Zm28.42,26.68q0,14.65,1.43,29.3h-27.7a37.15,37.15,0,0,1-2.15-9.53H192c-5.49,5.72-12.66,11.19-29.37,11.19-22,0-36.78-13.57-36.78-37.87s19.34-38.58,62.81-38.58h4.54V84.08c0-12.86-6.21-17.63-19.83-17.63-14.57,0-31.28,6.2-38.93,11.91V54.78a85.29,85.29,0,0,1,42.28-11c30.09,0,44.9,11,44.9,40Z"/><path d="M55.89,165.54V148.86c0-22.62-2.63-33.82-11.71-53.35L0,0H30.57l37.5,81.7c11,23.82,15.76,36.2,15.76,63.59v20.25ZM73.8,80,108.67,0h29.38L102.7,80Z"/></svg>

                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-dark height-8 mx-3 mt-4" viewBox="0 0 106.4 34.21"><path d="M48.37,10.57c2.05,0,3.7-2.37,3.7-5.29S50.41,0,48.37,0s-3.72,2.36-3.72,5.28S46.31,10.57,48.37,10.57Z"/><path d="M41.46,18h0c3.72-.8,3.2-5.24,3.1-6.22-.18-1.5-1.94-4.11-4.33-3.9-3,.26-3.45,4.61-3.45,4.61C36.37,14.54,37.75,18.82,41.46,18Z"/><path d="M45.41,25.76a3.14,3.14,0,0,0-.14,1.81A2.06,2.06,0,0,0,47,29.2h2V24.44H46.9A2.28,2.28,0,0,0,45.41,25.76Z"/><path d="M57.21,10.91h0c2.75.36,4.51-2.57,4.86-4.8A5,5,0,0,0,58.72.88c-1.95-.45-4.39,2.67-4.6,4.7C53.85,8.08,54.47,10.55,57.21,10.91Z"/><path d="M63.94,24h0a37.94,37.94,0,0,1-6.73-6.84c-3.36-5.23-8.14-3.1-9.73-.44a22.29,22.29,0,0,1-4.42,4.79c-.36.44-5.13,3-4.07,7.73s4.78,4.61,4.78,4.61a20.87,20.87,0,0,0,5.92-.44,12.65,12.65,0,0,1,5.93.17s7.43,2.5,9.46-2.3S63.94,24,63.94,24ZM51.21,31.11H46.38a4.2,4.2,0,0,1-3-2.08A5.5,5.5,0,0,1,43,25.69a4.23,4.23,0,0,1,3.47-3.13H49V19.4l2.18,0Zm9,0H54.65C52.49,30.52,52.39,29,52.39,29V22.84h0l2.26,0v5.53c.13.59.87.7.87.7h2.3V22.84h2.4Z"/><path d="M68.09,14.65h0c0-1.07-.88-4.27-4.15-4.27s-3.72,3-3.72,5.16.17,4.88,4.25,4.8S68.09,15.72,68.09,14.65Z"/><path d="M86.71,18.8V16.21H69.63l0,2.63H77l-.7,1.57H70v13H84.85a1.38,1.38,0,0,0,1.41-1.57V20.42H80l.55-1.6h6.15ZM83.39,30.65s-.18.43-.43.43H73.11v-3H83.39v2.6Zm0-5.1H73.11V22.7H83.37Zm22.86-9.27H99.52V15H96.38v1.24H88.69V33.4h2.77v-15h14.77Zm-1.81,3.56v-1h-2.7v1H96.16v-1H93.6v1H91.87l0,1.94h1.7v3.66H103a1.55,1.55,0,0,0,1.47-1.37V21.78h2v-2h-2Zm-2.7,3.27s-.24.44-.55.44h-5v-1.8h5.58v1.37Zm-9.47,5,4.3,2.5a6.8,6.8,0,0,1-1.8.85H91.88v1.92h3.9A19,19,0,0,0,99.09,32a6.5,6.5,0,0,0,2.6,1.16h4.44V31.28h-3.34a4.83,4.83,0,0,1-1.71-.65l5-2.9V26.15H92.25v2Zm9,0-2.46,1.3-2.26-1.3ZM31.62,19h3.73V15.73H31.62Zm0,14.31h3.73V20.45H31.62ZM25.56,20.46l-7.95,0v2.7h7s1.66.4,1.66,1.46v1H19.93a4,4,0,0,0-3.28,3.19,5.13,5.13,0,0,0,.14,2.32,3.88,3.88,0,0,0,3,2.3H29.82V24.14a4.73,4.73,0,0,0-4.26-3.7m.68,10.37H21.16a1.74,1.74,0,0,1-1-.84,1.18,1.18,0,0,1,0-.94,1.92,1.92,0,0,1,1.09-1h5v2.76Zm-10.4-2a4.44,4.44,0,0,0-2.71-4.22c2.39-1.25,2.08-4.39,2.08-4.39-.25-4.8-6.13-4.58-6.13-4.58H0V33.53H10.25c6,0,5.58-4.72,5.58-4.72M10,30.2H3.89V26.35H10l.21,0a2.25,2.25,0,0,1,1.58,1.26,2.32,2.32,0,0,1-.28,1.71,2.1,2.1,0,0,1-1.48.85m1.3-8.31a2.06,2.06,0,0,1-1.51.92H3.89v-3.7H9.8a1.83,1.83,0,0,1,1.71,1,2.9,2.9,0,0,1-.18,1.82"/></svg>
            </div>
        </div>
    </div>

    <div class="bg-base-0 overflow-hidden">
        <div class="container py-5 py-md-7 position-relative z-1">
            <div class="row mx-n5">
                <div class="col-12 col-lg-6 px-5">
                    <div class="row">
                        <div class="col-12 text-center {{ (__('lang_dir') == 'rtl' ? 'text-lg-right' : 'text-lg-left') }}">
                            <h2 class="h2 mb-3 font-weight-bold">{{ __('Complete solution') }}</h2>
                            <div class="m-auto">
                                <p class="text-muted font-weight-normal font-size-lg mb-0">{{ __('Comprehensive platform to easily manage your SEO reports, projects and tools.') }}</p>
                            </div>
                        </div>

                        <div class="col-12 pt-4 mt-4">
                            <div class="d-flex flex-row">
                                <div class="d-flex width-12 height-12 position-relative align-items-center justify-content-center flex-shrink-0 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">
                                    <div class="position-absolute bg-primary opacity-10 top-0 right-0 bottom-0 left-0 border-radius-xl"></div>
                                    @include('icons.list-alt', ['class' => 'fill-current width-6 height-6 text-primary'])
                                </div>
                                <div class="{{ (__('lang_dir') == 'rtl' ? 'mr-1' : 'ml-1') }}">
                                    <div class="d-block w-100"><div class="h5 mt-0 mb-1 d-inline-block font-weight-bold">{{ __('Reports') }}</div></div>
                                    <div class="d-block w-100 text-muted">{{ __('Get detailed SEO reports for your webpages, and get tips on how to improve them.') }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 pt-4 mt-4">
                            <div class="d-flex flex-row">
                                <div class="d-flex width-12 height-12 position-relative align-items-center justify-content-center flex-shrink-0 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">
                                    <div class="position-absolute bg-primary opacity-10 top-0 right-0 bottom-0 left-0 border-radius-xl"></div>
                                    @include('icons.account-tree', ['class' => 'fill-current width-6 height-6 text-primary'])
                                </div>
                                <div class="{{ (__('lang_dir') == 'rtl' ? 'mr-1' : 'ml-1') }}">
                                    <div class="d-block w-100"><div class="h5 mt-0 mb-1 d-inline-block font-weight-bold">{{ __('Projects') }}</div></div>
                                    <div class="d-block w-100 text-muted">{{ __('Manage your reports more efficiently with the automatically generated projects.') }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 pt-4 mt-4">
                            <div class="d-flex flex-row">
                                <div class="d-flex width-12 height-12 position-relative align-items-center justify-content-center flex-shrink-0 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">
                                    <div class="position-absolute bg-primary opacity-10 top-0 right-0 bottom-0 left-0 border-radius-xl"></div>
                                    @include('icons.handyman', ['class' => 'fill-current width-6 height-6 text-primary'])
                                </div>
                                <div class="{{ (__('lang_dir') == 'rtl' ? 'mr-1' : 'ml-1') }}">
                                    <div class="d-block w-100"><div class="h5 mt-0 mb-1 d-inline-block font-weight-bold">{{ __('Tools') }}</div></div>
                                    <div class="d-block w-100 text-muted">{{ __('Expand your toolbox with our diverse web tools and utilities.') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 position-relative px-5 mt-5 mt-lg-0">
                    <div class="position-relative">
                        <div class="position-absolute top-0 right-0 bottom-0 left-0 bg-primary opacity-10 border-radius-xl" style="transform: translate(1rem, 1rem);"></div>

                        <div class="card border-0 shadow-lg border-radius-xl overflow-hidden cursor-default">
                            <div class="card-body">
                                <div class="list-group list-group-flush my-n3">
                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col d-flex text-truncate">
                                                <div class="text-truncate">
                                                    <div class="d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="width-4 height-4 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}" viewBox="0 0 40 40"><path d="M20,40A20,20,0,1,0,0,20,20,20,0,0,0,20,40ZM26.24,9.32c.3-1.08-.74-1.72-1.7-1L11.19,17.79c-1,.74-.87,2.21.25,2.21H15v0H21.8l-5.58,2-2.46,8.74c-.3,1.08.74,1.72,1.7,1l13.35-9.51c1-.74.87-2.21-.25-2.21H23.23Z" style="fill:#f15757;fill-rule:evenodd"/></svg>

                                                        <div class="text-truncate {{ (__('lang_dir') == 'rtl' ? 'ml-2' : 'mr-2') }}">
                                                            <div class="text-primary text-truncate" dir="ltr">example.com</div>
                                                        </div>

                                                        <span class="d-flex align-items-center"><span class="d-none d-md-inline-block badge badge-success text-truncate">{{ __('Good') }}</span></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="width-4 flex-shrink-0 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}"></div>
                                                        <div class="text-muted text-truncate small">
                                                            <span class="text-muted">{{ \Carbon\Carbon::now()->subSeconds(8)->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto d-flex">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="btn d-flex align-items-center btn-sm text-primary cursor-default">@include('icons.more-horiz', ['class' => 'fill-current width-4 height-4'])&#8203;</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-lg border-radius-xl overflow-hidden cursor-default mt-3">
                            <div class="card-body">
                                <div class="list-group list-group-flush my-n3">
                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col d-flex text-truncate">
                                                <div class="text-truncate">
                                                    <div class="d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="width-4 height-4 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}" viewBox="0 0 40 40"><path d="M20,40A20,20,0,1,0,0,20,20,20,0,0,0,20,40Zm3.09-24.55a4.37,4.37,0,1,0-6.18,0L20,18.54Zm1.46,7.64a4.37,4.37,0,1,0,0-6.18L21.46,20Zm-1.46,7.63a4.37,4.37,0,0,0,0-6.17L20,21.46l-3.09,3.09a4.37,4.37,0,0,0,6.18,6.17ZM9.28,23.09a4.37,4.37,0,1,1,6.17-6.18L18.54,20l-3.09,3.09A4.37,4.37,0,0,1,9.28,23.09Z" style="fill:#946fff;fill-rule:evenodd"/></svg>

                                                        <div class="text-truncate {{ (__('lang_dir') == 'rtl' ? 'ml-2' : 'mr-2') }}">
                                                            <div class="text-primary text-truncate" dir="ltr">example.net</div>
                                                        </div>

                                                        <span class="d-flex align-items-center"><span class="d-none d-md-inline-block badge badge-warning text-truncate">{{ __('Decent') }}</span></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="width-4 flex-shrink-0 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}"></div>
                                                        <div class="text-muted text-truncate small">
                                                            <span class="text-muted">{{ \Carbon\Carbon::now()->subMinutes(52)->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto d-flex">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="btn d-flex align-items-center btn-sm text-primary cursor-default">@include('icons.more-horiz', ['class' => 'fill-current width-4 height-4'])&#8203;</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-lg border-radius-xl overflow-hidden cursor-default mt-3">
                            <div class="card-body">
                                <div class="list-group list-group-flush my-n3">
                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col d-flex text-truncate">
                                                <div class="text-truncate">
                                                    <div class="d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="width-4 height-4 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}" viewBox="0 0 15.95 16"><path d="M10,.42,8.46,0,7.14,5,5.94.48,4.37.9,5.66,5.73,2.44,2.51,1.29,3.66,4.82,7.19.42,6,0,7.59,4.81,8.87a2.92,2.92,0,0,1-.09-.73,3.26,3.26,0,1,1,6.52,0,3.55,3.55,0,0,1-.08.73L15.52,10,16,8.47l-4.83-1.3L15.52,6,15.1,4.42l-4.83,1.3,3.22-3.23L12.34,1.34,8.86,4.83Z" style="fill:#f97316"/><path d="M11.15,8.89a3.2,3.2,0,0,1-.81,1.49l3.17,3.17,1.15-1.15Z" style="fill:#f97316"/><path d="M10.31,10.41a3.3,3.3,0,0,1-1.46.87L10,15.57l1.58-.42Z" style="fill:#f97316"/><path d="M8.79,11.29a3.1,3.1,0,0,1-.81.1,3.58,3.58,0,0,1-.87-.11L6,15.58,7.53,16Z" style="fill:#f97316"/><path d="M7.06,11.26a3.18,3.18,0,0,1-1.43-.87L2.45,13.56,3.6,14.71Z" style="fill:#f97316"/><path d="M5.6,10.36a3.23,3.23,0,0,1-.79-1.48L.43,10.06l.42,1.57Z" style="fill:#f97316"/></svg>

                                                        <div class="text-truncate {{ (__('lang_dir') == 'rtl' ? 'ml-2' : 'mr-2') }}">
                                                            <div class="text-primary text-truncate" dir="ltr">example.org</div>
                                                        </div>

                                                        <span class="d-flex align-items-center"><span class="d-none d-md-inline-block badge badge-danger text-truncate">{{ __('Bad') }}</span></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="width-4 flex-shrink-0 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}"></div>
                                                        <div class="text-muted text-truncate small">
                                                            <span class="text-muted">{{ \Carbon\Carbon::now()->subHours(18)->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto d-flex">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="btn d-flex align-items-center btn-sm text-primary cursor-default">@include('icons.more-horiz', ['class' => 'fill-current width-4 height-4'])&#8203;</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-lg border-radius-xl overflow-hidden cursor-default mt-3">
                            <div class="card-body">
                                <div class="list-group list-group-flush my-n3">
                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col d-flex text-truncate">
                                                <div class="text-truncate">
                                                    <div class="d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="width-4 height-4 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}" viewBox="0 0 100 100"><polygon points="0 0 50 0 0 50 0 0" style="fill:#009cea"/><polygon points="0 50 50 50 0 100 0 50" style="fill:#009cea"/><polygon points="50 0 100 0 50 50 50 0" style="fill:#009cea"/><circle cx="75" cy="75" r="25" style="fill:#009cea"/></svg>

                                                        <div class="text-truncate {{ (__('lang_dir') == 'rtl' ? 'ml-2' : 'mr-2') }}">
                                                            <div class="text-primary text-truncate" dir="ltr">example.edu</div>
                                                        </div>

                                                        <span class="d-flex align-items-center"><span class="d-none d-md-inline-block badge badge-success text-truncate">{{ __('Good') }}</span></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="width-4 flex-shrink-0 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}"></div>
                                                        <div class="text-muted text-truncate small">
                                                            <span class="text-muted">{{ \Carbon\Carbon::now()->subDays(4)->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto d-flex">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="btn d-flex align-items-center btn-sm text-primary cursor-default">@include('icons.more-horiz', ['class' => 'fill-current width-4 height-4'])&#8203;</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-lg border-radius-xl overflow-hidden cursor-default mt-3">
                            <div class="card-body">
                                <div class="list-group list-group-flush my-n3">
                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col d-flex text-truncate">
                                                <div class="text-truncate">
                                                    <div class="d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="width-4 height-4 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}" viewBox="0 0 40 40"><path d="M8.55,3.6A20,20,0,0,0,4.71,7.11c4.58-.42,10.42.27,17.18,3.66,7.23,3.61,13,3.73,17.1,3a20.14,20.14,0,0,0-1.37-3.2C33,11,27,10.36,20.11,6.9A29.64,29.64,0,0,0,8.55,3.6ZM34.91,6.67A20,20,0,0,0,15,.64a37,37,0,0,1,6.93,2.68A28.82,28.82,0,0,0,34.91,6.67Zm5,11c-4.89,1-11.65.77-19.75-3.29C12.53,10.56,6.5,10.6,2.43,11.51l-.61.14A19.82,19.82,0,0,0,.56,15.29c.32-.08.66-.17,1-.24C6.5,14,13.47,14,21.89,18.21,29.47,22,35.5,22,39.57,21.05L40,21c0-.31,0-.63,0-.95A20.66,20.66,0,0,0,39.86,17.63Zm-.54,7.54c-4.84.85-11.4.52-19.21-3.38C12.53,18,6.5,18.05,2.43,19A19.75,19.75,0,0,0,0,19.66V20a20,20,0,0,0,39.32,5.17Z" style="fill:#10d08f;fill-rule:evenodd"/></svg>

                                                        <div class="text-truncate {{ (__('lang_dir') == 'rtl' ? 'ml-2' : 'mr-2') }}">
                                                            <div class="text-primary text-truncate" dir="ltr">example.uk</div>
                                                        </div>

                                                        <span class="d-flex align-items-center"><span class="d-none d-md-inline-block badge badge-warning text-truncate">{{ __('Decent') }}</span></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="width-4 flex-shrink-0 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}"></div>
                                                        <div class="text-muted text-truncate small">
                                                            <span class="text-muted">{{ \Carbon\Carbon::now()->subDays(8)->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto d-flex">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="btn d-flex align-items-center btn-sm text-primary cursor-default">@include('icons.more-horiz', ['class' => 'fill-current width-4 height-4'])&#8203;</div>
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

    <div class="bg-base-0">
        <div class="container position-relative py-5 py-md-7 d-flex flex-column z-1">
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
    @else
        <div class="bg-base-1">
            <div class="container position-relative text-center py-5 py-md-7 d-flex flex-column z-1">
                <div class="flex-grow-1">
                    <div class="badge badge-pill badge-success mb-3 px-3 py-2">{{ __('Join us') }}</div>
                    <div class="text-center">
                        <h4 class="mb-3 font-weight-bold">{{ __('Ready to get started?') }}</h4>
                        <div class="m-auto">
                            <p class="font-weight-normal text-muted font-size-lg mb-0">{{ __('Create an account in seconds.') }}</p>
                        </div>
                    </div>
                </div>

                <div><a href="{{ config('settings.registration') ? route('register') : route('login') }}" class="btn btn-primary btn-lg font-size-lg mt-5">{{ __('Get started') }}</a></div>
            </div>
        </div>
    @endif
</div>
@endsection
