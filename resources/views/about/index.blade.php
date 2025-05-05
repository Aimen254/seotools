@extends('layouts.app')

@section('site_title', formatTitle('About Us - Free Tools for Everyone | alltoolsfree'))
@section('site_description', formatTitle('Free online tools for coding, SEO & content creation. No login required. Fast, simple, ad-supported tools trusted by users worldwide.'))
@section('head_content')
<link rel="canonical" href="{{ route('about') }}" />
@endsection

@section('content')
    <div class="bg-base-1 d-flex align-items-center flex-fill">
        <div class="container py-6">
            {{-- Mobile Header --}}
            <div class="text-center d-block d-lg-none mb-4">
                <h1 class="h2 mb-2">{{ __('About Us') }}</h1>
                <p class="text-muted font-size-lg">{{ __('Learn more about our mission and values.') }}</p>
            </div>

            {{-- Main Content --}}
            <div class="row justify-content-center align-items-center">
                <div class="col-12">
                    <div class="card border-0 shadow-sm overflow-hidden mb-5">
                        <div class="row no-gutters">
                            {{-- Left Content --}}
                            <div class="col-12 col-lg-5">
                                <div class="card-body p-4 p-lg-5">
                                    {{-- Who We Are --}}
                                    <div class="mb-4">
                                        <h2 class="h4 font-weight-bold">{{ __('Who We Are') }}</h2>
                                        <p class="text-muted">
                                            At <strong>AllToolsFree.com</strong>, we're committed to providing 100% free, no-strings-attached online tools that help developers, content creators, and IT professionals work more efficiently.
                                        </p>
                                    </div>

                                    {{-- Mission --}}
                                    <div class="mb-4">
                                        <h3 class="h5 font-weight-bold">{{ __('Our Mission') }}</h3>
                                        <p class="text-muted mb-2">{{ __('To democratize access to essential digital tools by offering:') }}</p>
                                        <ul class="text-muted pl-3 mb-0">
                                            <li>Instant access with no registration required</li>
                                            <li>Enterprise-level functionality without costs</li>
                                            <li>Regular updates based on user needs</li>
                                            <li>Privacy-focused tools that respect your data</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            {{-- Right Image --}}
                            <div class="col-12 col-lg-7 d-none d-lg-flex bg-dark background-size-cover background-position-center" style="background-image: url({{ asset('img/about.svg') }});">
                                <div class="p-5 text-light d-flex align-items-center">
                                    <div class="{{ (__('lang_dir') == 'rtl' ? 'mr-5' : 'ml-5') }}">
                                        <div class="h2 font-weight-bold">{{ __('About Us') }}</div>
                                        <div class="font-size-lg font-weight-medium">{{ __('Learn more about our mission and values.') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Informational Section --}}
                    <div class="d-flex justify-content-center">
                        <div class="card border-0 shadow-sm px-4 px-lg-5 py-5 w-100" style="max-width: 960px; background: linear-gradient(135deg, #f9f9fb, #f0f4f8);">
                            
                            {{-- Why Choose Us --}}
                            <div class="mb-5 text-center">
                                <h3 class="h4 font-weight-bold mb-3">{{ __('Why Choose AllToolsFree?') }}</h3>
                                <p class="text-muted mb-4">Discover the reasons our users trust us for their daily tool needs.</p>
                                <div class="row">
                                    <div class="col-md-6 mb-3 d-flex align-items-center">
                                        <span class="badge bg-success rounded-circle me-3 p-3"><i class="bi bi-check-lg text-white"></i></span>
                                        <div><strong>Zero Cost:</strong> Every tool is completely free</div>
                                    </div>
                                    <div class="col-md-6 mb-3 d-flex align-items-center">
                                        <span class="badge bg-success rounded-circle me-3 p-3"><i class="bi bi-check-lg text-white"></i></span>
                                        <div><strong>No Accounts:</strong> Use instantly without signup</div>
                                    </div>
                                    <div class="col-md-6 mb-3 d-flex align-items-center">
                                        <span class="badge bg-success rounded-circle me-3 p-3"><i class="bi bi-shield-lock text-white"></i></span>
                                        <div><strong>Privacy First:</strong> We never store your input data</div>
                                    </div>
                                    <div class="col-md-6 mb-3 d-flex align-items-center">
                                        <span class="badge bg-success rounded-circle me-3 p-3"><i class="bi bi-shield-lock text-white"></i></span>
                                        <div><strong>Mobile Ready:</strong>Works great on all devices</div>
                                    </div>
                                    <div class="col-md-6 mb-3 d-flex align-items-center">
                                        <span class="badge bg-success rounded-circle me-3 p-3"><i class="bi bi-arrow-repeat text-white"></i></span>
                                        <div><strong>Constant Updates:</strong> New tools added regularly</div>
                                    </div>
                                </div>
                            </div>

                            {{-- Section Divider --}}
                            <hr class="my-5" style="opacity: 0.1;">

                            {{-- Our Values --}}
                            <div class="mb-5 text-center">
                                <h3 class="h4 font-weight-bold mb-3">{{ __('Our Values') }}</h3>
                                <p class="text-muted mb-4">These are the principles that drive everything we do.</p>
                                <div class="row">
                                    <div class="col-md-6 mb-3 d-flex align-items-center">
                                        <span class="text-primary font-weight-bold me-3">🔹</span>
                                        <div><strong>Simplicity:</strong>Easy-to-use, no learning needed</div>
                                    </div>
                                    <div class="col-md-6 mb-3 d-flex align-items-center">
                                        <span class="text-primary font-weight-bold me-3">🔹</span>
                                        <div><strong>Reliability:</strong> 99.9% uptime for all tools</div>
                                    </div>
                                    <div class="col-md-6 mb-3 d-flex align-items-center">
                                        <span class="text-primary font-weight-bold me-3">🔹</span>
                                        <div><strong>Speed:</strong> Instant results, no delay</div>
                                    </div>
                                    <div class="col-md-6 mb-3 d-flex align-items-center">
                                        <span class="text-primary font-weight-bold me-3">🔹</span>
                                        <div><strong>Transparency:</strong> No hidden features, clear purpose</div>
                                    </div>
                                </div>
                            </div>

                            {{-- Section Divider --}}
                            <hr class="my-5" style="opacity: 0.1;">

                            {{-- Closing Call to Action --}}
                            <div class="text-center">
                                <h3 class="h4 font-weight-bold mb-3">{{ __('Join Our Growing Community') }}</h3>
                                <p class="text-muted mb-0">
                                    Over <strong>50,000 professionals</strong> trust AllToolsFree.com for their daily tool needs.
                                    Whether you're debugging a website, creating content, or analyzing domains, we provide the free utilities to get the job done.
                                    <br><br>
                                    Have suggestions for new tools?
                                    <a href="{{ route('contact') }}">{{ __('Contact us') }}</a> — we’re always expanding based on user feedback!
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    .list-animated li {
        transition: transform 0.3s ease, opacity 0.3s ease;
    }
    .list-animated li:hover {
        transform: translateY(-3px);
        opacity: 0.9;
    }

    .badge {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .d-flex.align-items-center {
        display: flex;
        align-items: center;
    }

    .me-3 {
        margin-right: 1rem;
    }

    /* Adjust the badge size for small screens */
    @media (max-width: 767px) {
        .badge {
            width: 2rem;
            height: 2rem;
            font-size: 1rem;
        }
        .badge i {
            font-size: 1.2rem;
        }
    }
    </style>
@endsection

@include('shared.sidebars.user')
