@section('site_title', formatTitle('Free Domain IP Lookup Tool | Find Website IP Address | AllToolsFree.com'))
@section('site_description', formatTitle('nstantly find the IP address of any domain with our free Domain IP Lookup tool. Check server locations, verify hosting details, and troubleshoot connectivity issues in seconds. No registration needed!'))


@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Domain IP lookup') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Domain IP lookup') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.domain_ip_lookup') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Search') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.domain_ip_lookup') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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

@if(!empty($result))
    <div class="card border-0 shadow-sm mt-3">
        <div class="card-header align-items-center">
            <div class="row">
                <div class="col">
                    <div class="font-weight-medium py-1">{{ __('Results') }}</div>
                </div>
            </div>
        </div>
        <div class="card-body mb-n3">
            <div class="row mx-n2">
                <div class="col-12 px-2">
                    <div class="form-group">
                        <label for="i-result-ip">{{ __('IP') }}</label>
                        <div class="input-group">
                            <input id="i-result-ip" class="form-control" type="text" value="{{ __($result['traits']['ip_address'] ?? 'Unknown') }}" readonly>
                            <div class="input-group-append">
                                <div class="btn btn-primary" data-tooltip-copy="true" title="{{ __('Copy') }}" data-text-copy="{{ __('Copy') }}" data-text-copied="{{ __('Copied') }}" data-clipboard="true" data-clipboard-target="#i-result-ip">{{ __('Copy') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 px-2">
                    <div class="form-group">
                        <label for="i-result-country">{{ __('Country') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <img src="{{ asset('img/icons/countries/'. mb_strtolower($result['country']['iso_code'] ?? 'unknown')) }}.svg" class="width-4 height-4">
                                </div>
                            </div>
                            <input id="i-result-country" class="form-control" type="text" value="{{ __($result['country']['names']['en'] ?? 'Unknown') }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 px-2">
                    <div class="form-group">
                        <label for="i-result-city">{{ __('City') }}</label>
                        <input id="i-result-city" class="form-control" type="text" value="{{ __($result['city']['names']['en'] ?? 'Unknown') }}" readonly>
                    </div>
                </div>

                <div class="col-12 col-md-4 px-2">
                    <div class="form-group">
                        <label for="i-result-postal-code">{{ __('Postal code') }}</label>
                        <input id="i-result-postal-code" class="form-control" type="text" value="{{ __($result['postal']['code'] ?? 'Unknown') }}" readonly>
                    </div>
                </div>

                <div class="col-12 col-md-4 px-2">
                    <div class="form-group">
                        <label for="i-result-latitude">{{ __('Latitude') }}</label>
                        <input id="i-result-latitude" class="form-control" type="text" value="{{ __($result['location']['latitude'] ?? 'Unknown') }}" readonly>
                    </div>
                </div>

                <div class="col-12 col-md-4 px-2">
                    <div class="form-group">
                        <label for="i-result-longitude">{{ __('Longtitude') }}</label>
                        <input id="i-result-longitude" class="form-control" type="text" value="{{ __($result['location']['longitude'] ?? 'Unknown') }}" readonly>
                    </div>
                </div>

                <div class="col-12 col-md-4 px-2">
                    <div class="form-group">
                        <label for="i-result-timezone">{{ __('Timezone') }}</label>
                        <input id="i-result-timezone" class="form-control" type="text" value="{{ __($result['location']['time_zone'] ?? 'Unknown') }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="card border-0 shadow-sm mt-4">
    <div class="card-body">
        <h3 class="h4 mb-3">{{ __('Domain IP Lookup Tool - Free Online Domain to IP Finder') }}</h3>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">ℹ️</div>
                <div>{{ __('Instantly find IP addresses for any website with our free tool. Get server IPs with geolocation data to troubleshoot connectivity and analyze hosting.') }}</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ {{ __('100% Free') }}</span>
            <span class="badge badge-primary mr-2 mb-2">✅ {{ __('No Registration') }}</span>
            <span class="badge badge-info mb-2">✅ {{ __('Instant Results') }}</span>
        </div>

        <h4 class="h5 mb-3">{{ __('Why Use Our Domain IP Lookup Tool?') }}</h4>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">⚡ {{ __('Quick Domain-to-IP Resolution') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Instantly converts domains (example.com) to IPs (192.0.2.1)') }}</li>
                            <li class="mb-1"> {{ __('Supports both IPv4 and IPv6 addresses') }}</li>
                            <li>{{ __('Identifies primary and secondary server IPs') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🌍 {{ __('Geolocation Data') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Shows physical server locations') }}</li>
                            <li> {{ __('Displays country, region, city and ISP') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🔧 {{ __('Network Troubleshooting') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Diagnose DNS propagation issues') }}</li>
                            <li> {{ __('Verify server migrations and changes') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🔒 {{ __('Security & SEO Benefits') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Identify suspicious domains on shared IPs') }}</li>
                            <li> {{ __('Check CDN usage for optimization') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="h5 mb-3 mt-4">{{ __('Understanding IP Lookup Results') }}</h4>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>{{ __('Information') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Why It Matters') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>{{ __('IP Address') }}</strong></td>
                        <td>{{ __('Numerical label assigned to the server') }}</td>
                        <td>{{ __('Identifies the machine hosting the website') }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('Country/City') }}</strong></td>
                        <td>{{ __('Physical server location') }}</td>
                        <td>{{ __('Impacts site speed and local SEO') }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('ISP/Hosting') }}</strong></td>
                        <td>{{ __('Server infrastructure provider') }}</td>
                        <td>{{ __('Reveals hosting quality and neighbors') }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('IP Version') }}</strong></td>
                        <td>{{ __('IPv4 (192.0.2.1) or IPv6 (2001:0db8::)') }}</td>
                        <td>{{ __('Shows modern infrastructure adoption') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h4 class="h5 mb-3">{{ __('Who Should Use This Tool?') }}</h4>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">👨‍💻 {{ __('Web Developers & Sysadmins') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Troubleshoot DNS and hosting issues') }}</li>
                            <li> {{ __('Verify server configurations') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🔍 {{ __('SEO Specialists') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Analyze competitor hosting setups') }}</li>
                            <li> {{ __('Verify CDN implementations') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🛡️ {{ __('Security Researchers') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Identify suspicious domains') }}</li>
                            <li> {{ __('Check for phishing infrastructure') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-success mt-4 p-4 shadow-lg">
            <h5 class="h6 mb-3 text-white">{{ __('Privacy & Security') }}</h5>
            <ul class="list-unstyled mb-0">
                <li class="mb-1 text-white"> {{ __('No logs kept - your lookups remain private') }}</li>
                <li class="mb-1 text-white"> {{ __('Secure HTTPS encrypted queries') }}</li>
                <li class="text-white"> {{ __('No signup required - completely anonymous') }}</li>
            </ul>
        </div>

        <h4 class="h5 mb-3 mt-4">{{ __('Frequently Asked Questions') }}</h4>
        
        <div class="accordion mb-4" id="faqAccordion">
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne">
                            {{ __('What is a Domain IP Lookup?') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        {{ __('A process that converts domain names (like alltoolsfree.com) to IP addresses (like 192.0.2.1).') }}
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            {{ __("Why would I need to find a domain's IP?") }}
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        {{ __('Common uses include troubleshooting, checking hosting locations, security research, and SEO analysis.') }}
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            {{ __('Is this tool really free?') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ {{ __('Yes! AllToolsFree provides this with no hidden costs.') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="h6 mb-3">{{ __('Try Our Related Free Tools') }}</h5>
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <a href="{{route('tools.dns_lookup')}}" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔍</div>
                                    <div class="font-weight-medium">{{ __('DNS Lookup') }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{route('tools.reverse_ip_lookup')}}" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔄</div>
                                    <div class="font-weight-medium">{{ __('Reverse IP Lookup') }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{route('tools.website_status_checker')}}" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🌐</div>
                                    <div class="font-weight-medium">{{ __('Website Status') }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{route('tools.ssl_checker')}}" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔒</div>
                                    <div class="font-weight-medium">{{ __('SSL Checker') }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>