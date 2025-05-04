@section('site_title', formatTitle('Free IP Lookup Tool | Find IP Address Location & Details | AllToolsFree.com'))
@section('site_description', formatTitle('Instantly lookup any IP address to find geolocation, ISP, hostname & network details. Our free IP lookup tool provides comprehensive data for developers, network admins & security professionals.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => route('dashboard'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('IP lookup') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('IP lookup') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.ip_lookup') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
            @cannot('tools', ['App\Models\User'])
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
            @endcannot

            @csrf

            <div class="form-group">
                <label for="i-ip">{{ __('IP') }}</label>
                <div class="input-group">
                    <input type="text" dir="ltr" name="ip" id="i-ip" class="form-control{{ $errors->has('ip') || isset($result) && empty($result) ? ' is-invalid' : '' }}" value="{{ $result['traits']['ip_address'] ?? (old('ip') ?? request()->ip()) }}">
                    <div class="input-group-append">
                        <div class="btn btn-primary" data-tooltip-copy="true" title="{{ __('Copy') }}" data-text-copy="{{ __('Copy') }}" data-text-copied="{{ __('Copied') }}" data-clipboard="true" data-clipboard-target="#i-ip">{{ __('Copy') }}</div>
                    </div>
                </div>

                @if ($errors->has('ip'))
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first('ip') }}</strong>
                    </span>
                @elseif(isset($result) && empty($result))
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ __('No results.') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Search') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.ip_lookup') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
<div class="card border-0 shadow-sm mt-4 p-3">
    <div class="card-body">
        <h3 class="h4 mb-3">{{ __('IP Lookup Tool - Free IP Address Locator') }}</h3>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">ℹ️</div>
                <div>{{ __('Instantly find location & ISP details for any IP address. Get geographic and network information in seconds.') }}</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ {{ __('100% Free') }}</span>
            <span class="badge badge-primary mr-2 mb-2">✅ {{ __('No Registration') }}</span>
            <span class="badge badge-info mb-2">✅ {{ __('Real-Time Results') }}</span>
        </div>

        <h4 class="h5 mb-3">{{ __('Why Use Our IP Lookup Tool?') }}</h4>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🌍 {{ __('Comprehensive IP Geolocation') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Pinpoint exact geographic location') }}</li>
                            <li class="mb-1"> {{ __('View ISP and organization details') }}</li>
                            <li>{{ __('Get latitude/longitude coordinates') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">📶 {{ __('Network Information') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Identify hosting providers') }}</li>
                            <li> {{ __('Check IP type (business/residential)') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🛡️ {{ __('Security & Fraud Prevention') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Detect suspicious IP addresses') }}</li>
                            <li> {{ __('Identify potential fraud attempts') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🔧 {{ __('Technical Insights') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Determine IP version (IPv4/IPv6)') }}</li>
                            <li> {{ __('Check ASN and network range') }}</li>
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
                        <td>{{ __('The numerical identifier') }}</td>
                        <td>{{ __('Identifies the network device') }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('Country/City') }}</strong></td>
                        <td>{{ __('Physical location') }}</td>
                        <td>{{ __('Geographic analysis') }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('ISP') }}</strong></td>
                        <td>{{ __('Internet Service Provider') }}</td>
                        <td>{{ __('Network identification') }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('Organization') }}</strong></td>
                        <td>{{ __('Company/entity using IP') }}</td>
                        <td>{{ __('Business verification') }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('Connection Type') }}</strong></td>
                        <td>{{ __('Residential/business/mobile') }}</td>
                        <td>{{ __('Usage context') }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('Proxy/VPN') }}</strong></td>
                        <td>{{ __('Anonymization status') }}</td>
                        <td>{{ __('Security assessment') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h4 class="h5 mb-3">{{ __('Who Benefits from This Tool?') }}</h4>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">👨‍💻 {{ __('Network Administrators') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Troubleshoot connectivity issues') }}</li>
                            <li> {{ __('Analyze traffic sources') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🛡️ {{ __('Security Professionals') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Detect suspicious login attempts') }}</li>
                            <li> {{ __('Investigate cyber threats') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🌐 {{ __('Website Owners') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Understand visitor demographics') }}</li>
                            <li> {{ __('Detect fraudulent activity') }}</li>
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
                            {{ __('What is an IP lookup?') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        {{ __('An IP lookup reveals the geographic location and network details associated with an IP address.') }}
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            {{ __('How accurate is IP geolocation?') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        {{ __('Typically accurate to city-level (95%+ for country, 50-80% for city). Mobile and VPN IPs may be less precise.') }}
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
                    <div class="col-md-4 mb-2">
                        <a href="{{route('tools.reverse_ip_lookup')}}" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔄</div>
                                    <div class="font-weight-medium">{{ __('Reverse IP Lookup') }}</div>
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
                </div>
            </div>
        </div>
    </div>
</div>
