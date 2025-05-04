@section('site_title', formatTitle('Free IDN Converter Tool | Encode & Decode Internationalized Domain Names | AllToolsFree.com'))  
@section('site_description', formatTitle('Convert IDN (Internationalized Domain Names) to Punycode and vice versa instantly. Free online tool for developers, SEOs, and domain managers. No registration needed.'))  

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => route('dashboard'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('IDN converter') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('IDN converter') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.idn_converter') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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
                <div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="i-type-sentence-case" name="type" class="custom-control-input{{ $errors->has('type') ? ' is-invalid' : '' }}" value="punycode" @if ((old('type') !== null && old('type') == 'punycode') || (isset($type) && $type == 'punycode' && old('type') == null)) checked @endif>
                        <label class="custom-control-label" for="i-type-sentence-case">{{ __('Text to punycode') }}</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="i-type-text-case" name="type" class="custom-control-input{{ $errors->has('type') ? ' is-invalid' : '' }}" value="text" @if ((old('type') !== null && old('type') == 'text') || (isset($type) && $type == 'text' && old('type') == null)) checked @endif>
                        <label class="custom-control-label" for="i-type-text-case">{{ __('Punycode to text') }}</label>
                    </div>
                </div>

                @if ($errors->has('type'))
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first('type') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Convert') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.idn_converter') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
        <div class="card-body mb-n3">
            <div class="form-group">
                <label for="i-result-domain">{{ __('Domain') }}</label>
                <div class="input-group">
                    <input id="i-result-domain" class="form-control" type="text" value="{{ $result }}" readonly>
                    <div class="input-group-append">
                        <div class="btn btn-primary" data-tooltip-copy="true" title="{{ __('Copy') }}" data-text-copy="{{ __('Copy') }}" data-text-copied="{{ __('Copied') }}" data-clipboard="true" data-clipboard-target="#i-result-domain">{{ __('Copy') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="card border-0 shadow-sm mt-4 p-3">
    <div class="card-body">
        <h3 class="h4 mb-3">{{ __('IDN Converter Tool - Free Internationalized Domain Name Converter') }}</h3>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">ℹ️</div>
                <div>{{ __('Convert between Unicode & Punycode instantly. Transform international domain names with special characters for DNS and registration.') }}</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ {{ __('100% Free') }}</span>
            <span class="badge badge-primary mr-2 mb-2">✅ {{ __('No Registration') }}</span>
            <span class="badge badge-info mb-2">✅ {{ __('Instant Conversion') }}</span>
        </div>

        <h4 class="h5 mb-3">{{ __('Why Use Our IDN Converter?') }}</h4>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🌐 {{ __('Universal Character Support') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Convert domains with non-ASCII characters') }}</li>
                            <li class="mb-1"> {{ __('Supports all Unicode scripts globally') }}</li>
                            <li>{{ __('Preserves special characters and symbols') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🔄 {{ __('Two-Way Conversion') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Unicode to Punycode conversion') }}</li>
                            <li> {{ __('Punycode to Unicode decoding') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">📝 {{ __('Domain Registration Prep') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Verify correct Punycode encoding') }}</li>
                            <li> {{ __('Ensure browser compatibility') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🔍 {{ __('Technical & SEO Benefits') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Prevent display issues in older systems') }}</li>
                            <li> {{ __('Optimize international SEO performance') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="h5 mb-3 mt-4">{{ __('Understanding IDN Conversion') }}</h4>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>{{ __('Format') }}</th>
                        <th>{{ __('Example') }}</th>
                        <th>{{ __('Usage') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>{{ __('Unicode') }}</strong></td>
                        <td>{{ __('中国移动.中国') }}</td>
                        <td>{{ __('Human-readable format') }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('Punycode') }}</strong></td>
                        <td>{{ __('xn--fiq228c.xn--fiqs8s') }}</td>
                        <td>{{ __('DNS-compatible encoding') }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('Mixed') }}</strong></td>
                        <td>{{ __('bücher.example.com') }}</td>
                        <td>{{ __('Hybrid domains') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h4 class="h5 mb-3">{{ __('Who Needs This Tool?') }}</h4>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🌍 {{ __('Global Businesses') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Register localized domain names') }}</li>
                            <li> {{ __('Ensure brand consistency') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">👨‍💻 {{ __('Web Developers') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Configure multilingual websites') }}</li>
                            <li> {{ __('Troubleshoot DNS issues') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🛡️ {{ __('Security Professionals') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Detect homograph attacks') }}</li>
                            <li> {{ __('Analyze malicious IDNs') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-success mt-4 p-4 shadow-lg">
            <h5 class="h6 mb-3 text-white">{{ __('Privacy & Security') }}</h5>
            <ul class="list-unstyled mb-0">
                <li class="mb-1 text-white"> {{ __('No data storage - conversions remain private') }}</li>
                <li class="mb-1 text-white"> {{ __('Secure HTTPS encrypted transfers') }}</li>
                <li class="text-white"> {{ __('No installation required') }}</li>
            </ul>
        </div>

        <h4 class="h5 mb-3 mt-4">{{ __('Frequently Asked Questions') }}</h4>
        
        <div class="accordion mb-4" id="faqAccordion">
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne">
                            {{ __('What is an IDN?') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        {{ __('An Internationalized Domain Name (IDN) contains non-ASCII characters for local languages (e.g., 東京.jp, ελληνικά.gr).') }}
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            {{ __('Why convert to Punycode?') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        {{ __('DNS systems only understand ASCII, so café.com becomes xn--caf-dma.com for technical processing.') }}
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            {{ __('Are IDNs good for SEO?') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ {{ __('Yes! Local-language domains improve regional search rankings and click-through rates.') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="h6 mb-3">{{ __('Try Our Related Tools') }}</h5>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <a href="{{route('tools.url_converter')}}" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔗</div>
                                    <div class="font-weight-medium">{{ __('URL Encoder/Decoder') }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="{{route('tools.dns_lookup')}}" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔍</div>
                                    <div class="font-weight-medium">{{ __('DNS Lookup') }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="{{route('tools.whois_lookup')}}" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">📋</div>
                                    <div class="font-weight-medium">{{ __('WHOIS Lookup') }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>