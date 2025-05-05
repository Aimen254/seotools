@section('site_title', formatTitle('Free CSS Minifier Tool | Compress & Optimize CSS Online | AllToolsFree.com'))
@section('site_description', formatTitle('Reduce CSS file size instantly with our free online CSS minifier tool. Remove comments, whitespace & optimize stylesheets for faster loading websites. Part of 50+ free developer tools at AllToolsFree.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('DNS lookup') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('DNS lookup') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.dns_lookup') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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
                    <a href="{{ route('tools.dns_lookup') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
            @if(empty($results))
                {{ __('No results found.') }}
            @else
                <ul class="nav nav-pills d-flex flex-fill flex-column flex-md-row mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item flex-grow-1 text-center">
                        <a class="nav-link active" id="pills-dns-a-tab" data-toggle="pill" href="#pills-dns-a" role="tab" aria-controls="pills-dns-a" aria-selected="true">{{ __('A') }}</a>
                    </li>
                    <li class="nav-item flex-grow-1 text-center">
                        <a class="nav-link" id="pills-dns-aaaa-tab" data-toggle="pill" href="#pills-dns-aaaa" role="tab" aria-controls="pills-dns-aaaa" aria-selected="false">{{ __('AAAA') }}</a>
                    </li>
                    <li class="nav-item flex-grow-1 text-center">
                        <a class="nav-link" id="pills-dns-cname-tab" data-toggle="pill" href="#pills-dns-cname" role="tab" aria-controls="pills-dns-cname" aria-selected="false">{{ __('CNAME') }}</a>
                    </li>
                    <li class="nav-item flex-grow-1 text-center">
                        <a class="nav-link" id="pills-dns-mx-tab" data-toggle="pill" href="#pills-dns-mx" role="tab" aria-controls="pills-dns-mx" aria-selected="false">{{ __('MX') }}</a>
                    </li>
                    <li class="nav-item flex-grow-1 text-center">
                        <a class="nav-link" id="pills-dns-txt-tab" data-toggle="pill" href="#pills-dns-txt" role="tab" aria-controls="pills-dns-txt" aria-selected="false">{{ __('TXT') }}</a>
                    </li>
                    <li class="nav-item flex-grow-1 text-center">
                        <a class="nav-link" id="pills-dns-ns-tab" data-toggle="pill" href="#pills-dns-ns" role="tab" aria-controls="pills-dns-ns" aria-selected="false">{{ __('NS') }}</a>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-dns-a" role="tabpanel"
                         aria-labelledby="pills-dns-a-tab">
                        <div class="list-group list-group-flush mb-n3">
                            <div class="list-group-item px-0">
                                <div class="row align-items-center text-muted">
                                    <div class="col-12 col-lg-2 text-truncate">{{ __('Type') }}</div>
                                    <div class="col-12 col-lg-4 text-truncate">{{ __('Hostname') }}</div>
                                    <div class="col-12 col-lg-4 text-truncate">{{ __('IP') }}</div>
                                    <div class="col-12 col-lg-2 text-truncate">{{ __('TTL') }}</div>
                                </div>
                            </div>

                            @foreach($results as $result)
                                @if(strtolower($result['type']) == 'a')
                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center text-muted">
                                            <div class="col-12 col-lg-2 text-break">{{ $result['type'] }}</div>
                                            <div class="col-12 col-lg-4 text-break">{{ $result['host'] }}</div>
                                            <div class="col-12 col-lg-4 text-break">{{ $result['ip'] }}</div>
                                            <div class="col-12 col-lg-2 text-break">{{ $result['ttl'] }}</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-dns-aaaa" role="tabpanel" aria-labelledby="pills-dns-aaaa-tab">
                        <div class="list-group list-group-flush mb-n3">
                            <div class="list-group-item px-0">
                                <div class="row align-items-center text-muted">
                                    <div class="col-12 col-lg-2 text-truncate">{{ __('Type') }}</div>
                                    <div class="col-12 col-lg-4 text-truncate">{{ __('Hostname') }}</div>
                                    <div class="col-12 col-lg-4 text-truncate">{{ __('IPv6') }}</div>
                                    <div class="col-12 col-lg-2 text-truncate">{{ __('TTL') }}</div>
                                </div>
                            </div>

                            @foreach($results as $result)
                                @if(strtolower($result['type']) == 'aaaa')
                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center text-muted">
                                            <div class="col-12 col-lg-2 text-break">{{ $result['type'] }}</div>
                                            <div class="col-12 col-lg-4 text-break">{{ $result['host'] }}</div>
                                            <div class="col-12 col-lg-4 text-break">{{ $result['ipv6'] }}</div>
                                            <div class="col-12 col-lg-2 text-break">{{ $result['ttl'] }}</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-dns-cname" role="tabpanel"
                         aria-labelledby="pills-dns-cname-tab">
                        <div class="list-group list-group-flush mb-n3">
                            <div class="list-group-item px-0">
                                <div class="row align-items-center text-muted">
                                    <div class="col-12 col-lg-2 text-truncate">{{ __('Type') }}</div>
                                    <div class="col-12 col-lg-4 text-truncate">{{ __('Hostname') }}</div>
                                    <div class="col-12 col-lg-4 text-truncate">{{ __('Target') }}</div>
                                    <div class="col-12 col-lg-2 text-truncate">{{ __('TTL') }}</div>
                                </div>
                            </div>

                            @foreach($results as $result)
                                @if(strtolower($result['type']) == 'cname')
                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center text-muted">
                                            <div class="col-12 col-lg-2 text-break">{{ $result['type'] }}</div>
                                            <div class="col-12 col-lg-4 text-break">{{ $result['host'] }}</div>
                                            <div class="col-12 col-lg-4 text-break">{{ $result['target'] }}</div>
                                            <div class="col-12 col-lg-2 text-break">{{ $result['ttl'] }}</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-dns-mx" role="tabpanel" aria-labelledby="pills-dns-mx-tab">
                        <div class="list-group list-group-flush mb-n3">
                            <div class="list-group-item px-0">
                                <div class="row align-items-center text-muted">
                                    <div class="col-12 col-lg-2 text-truncate">{{ __('Type') }}</div>
                                    <div class="col-12 col-lg-3 text-truncate">{{ __('Hostname') }}</div>
                                    <div class="col-12 col-lg-3 text-truncate">{{ __('Target') }}</div>
                                    <div class="col-12 col-lg-2 text-truncate">{{ __('Priority') }}</div>
                                    <div class="col-12 col-lg-2 text-truncate">{{ __('TTL') }}</div>
                                </div>
                            </div>

                            @foreach($results as $result)
                                @if(strtolower($result['type']) == 'mx')
                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center text-muted">
                                            <div class="col-12 col-lg-2 text-break">{{ $result['type'] }}</div>
                                            <div class="col-12 col-lg-3 text-break">{{ $result['host'] }}</div>
                                            <div class="col-12 col-lg-3 text-break">{{ $result['target'] }}</div>
                                            <div class="col-12 col-lg-2 text-break">{{ $result['pri'] }}</div>
                                            <div class="col-12 col-lg-2 text-break">{{ $result['ttl'] }}</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-dns-txt" role="tabpanel" aria-labelledby="pills-dns-txt-tab">
                        <div class="list-group list-group-flush mb-n3">
                            <div class="list-group-item px-0">
                                <div class="row align-items-center text-muted">
                                    <div class="col-12 col-lg-2 text-truncate">{{ __('Type') }}</div>
                                    <div class="col-12 col-lg-4 text-truncate">{{ __('Hostname') }}</div>
                                    <div class="col-12 col-lg-4 text-truncate">{{ __('Entries') }}</div>
                                    <div class="col-12 col-lg-2 text-truncate">{{ __('TTL') }}</div>
                                </div>
                            </div>

                            @foreach($results as $result)
                                @if(strtolower($result['type']) == 'txt')
                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center text-muted">
                                            <div class="col-12 col-lg-2 text-break">{{ $result['type'] }}</div>
                                            <div class="col-12 col-lg-4 text-break">{{ $result['host'] }}</div>
                                            <div class="col-12 col-lg-4 text-break">
                                                @foreach($result['entries'] as $entry)
                                                    <div class="text-break {{ !$loop->first ? 'mt-1' : '' }}">{{ $entry }}</div>
                                                @endforeach
                                            </div>
                                            <div class="col-12 col-lg-2 text-break">{{ $result['ttl'] }}</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-dns-ns" role="tabpanel" aria-labelledby="pills-dns-ns-tab">
                        <div class="list-group list-group-flush mb-n3">
                            <div class="list-group-item px-0">
                                <div class="row align-items-center text-muted">
                                    <div class="col-12 col-lg-2 text-truncate">{{ __('Type') }}</div>
                                    <div class="col-12 col-lg-4 text-truncate">{{ __('Hostname') }}</div>
                                    <div class="col-12 col-lg-4 text-truncate">{{ __('Target') }}</div>
                                    <div class="col-12 col-lg-2 text-truncate">{{ __('TTL') }}</div>
                                </div>
                            </div>

                            @foreach($results as $result)
                                @if(strtolower($result['type']) == 'ns')
                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center text-muted">
                                            <div class="col-12 col-lg-2 text-break">{{ $result['type'] }}</div>
                                            <div class="col-12 col-lg-4 text-break">{{ $result['host'] }}</div>
                                            <div class="col-12 col-lg-4 text-break">{{ $result['target'] }}</div>
                                            <div class="col-12 col-lg-2 text-break">{{ $result['ttl'] }}</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif
<div class="card border-0 shadow-sm mt-4">
    <div class="card-body">
        <h3 class="h4 mb-3">{{ __('DNS Lookup Tool - Free Online DNS Record Checker') }}</h3>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">ℹ️</div>
                <div>{{ __('Instantly check DNS records for any domain with our free tool. Get A, AAAA, CNAME, MX, TXT, NS, and SOA records in seconds.') }}</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ {{ __('100% Free') }}</span>
            <span class="badge badge-primary mr-2 mb-2">✅ {{ __('No Registration Required') }}</span>
            <span class="badge badge-info mb-2">✅ {{ __('Real-Time Results') }}</span>
        </div>

        <h4 class="h5 mb-3">{{ __('Why Use Our DNS Lookup Tool?') }}</h4>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🔍 {{ __('Comprehensive DNS Record Analysis') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Retrieve all DNS records for any domain') }}</li>
                            <li class="mb-1"> {{ __('Check A records (IPv4), AAAA records (IPv6), MX records') }}</li>
                            <li>{{ __('Verify TXT records (SPF, DKIM, DMARC)') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">⚡ {{ __('Fast & Accurate DNS Resolution') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Get instant results with high-speed queries') }}</li>
                            <li> {{ __('Supports global DNS servers') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🔧 {{ __('Troubleshoot Website & Email Issues') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Detect misconfigured DNS settings') }}</li>
                            <li> {{ __('Identify DNS propagation delays') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🔒 {{ __('SEO & Security Benefits') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Ensure correct DNS configurations') }}</li>
                            <li> {{ __('Prevent DNS spoofing & phishing attacks') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="h5 mb-3 mt-4">{{ __('Common DNS Records Explained') }}</h4>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>{{ __('Record Type') }}</th>
                        <th>{{ __('Purpose') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>{{ __('A Record') }}</strong></td>
                        <td>{{ __('Maps a domain to an IPv4 address (e.g., 192.0.2.1)') }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('AAAA Record') }}</strong></td>
                        <td>{{ __('Maps a domain to an IPv6 address') }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('CNAME') }}</strong></td>
                        <td>{{ __('Redirects a subdomain to another domain') }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('MX Record') }}</strong></td>
                        <td>{{ __('Specifies mail servers for email delivery') }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('TXT Record') }}</strong></td>
                        <td>{{ __('Stores SPF, DKIM, and DMARC records') }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('NS Record') }}</strong></td>
                        <td>{{ __('Lists authoritative name servers') }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ __('SOA Record') }}</strong></td>
                        <td>{{ __('Contains admin and zone transfer details') }}</td>
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
                            <li class="mb-1"> {{ __('Debug DNS misconfigurations') }}</li>
                            <li> {{ __('Verify domain migrations') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🔍 {{ __('SEO Specialists & Marketers') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Ensure correct domain redirects') }}</li>
                            <li> {{ __('Check CDN configurations') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">📧 {{ __('Email Administrators') }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"> {{ __('Validate MX & TXT records') }}</li>
                            <li> {{ __('Prevent spam & phishing risks') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-success mt-4 p-4 shadow-lg">
            <h5 class="h6 mb-3 text-white">{{ __('Privacy & Security') }}</h5>
            <ul class="list-unstyled mb-0">
                <li class="mb-1 text-white"> {{ __('No logs stored - your queries remain private') }}</li>
                <li class="mb-1 text-white"> {{ __('No signup required - use instantly') }}</li>
                <li class="text-white"> {{ __('Secure HTTPS encryption for all searches') }}</li>
            </ul>
        </div>

        <h4 class="h5 mb-3 mt-4">{{ __('Frequently Asked Questions') }}</h4>
        
        <div class="accordion mb-4" id="faqAccordion">
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne">
                            {{ __('What is a DNS lookup?') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        {{ __('A DNS lookup retrieves domain records (IPs, mail servers, etc.) to ensure proper website functionality.') }}
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            {{ __('How often do DNS records update?') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        {{ __('DNS changes can take up to 48 hours to propagate globally due to TTL (Time-to-Live) settings.') }}
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            {{ __('Can I check DNS records for free?') }}
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ {{ __('Yes! Our tool is 100% free with no hidden limits.') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="h6 mb-3">{{ __('Try Our Other Free Tools') }}</h5>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🌐</div>
                                    <a href="{{route('tools.domain_ip_lookup')}}" class="font-weight-medium">{{ __('Domain IP Lookup') }}</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔒</div>
                                    <a href="{{route('tools.ssl_checker')}}" class="font-weight-medium">{{ __('SSL Checker') }}</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">📋</div>
                                    <a href="{{route('tools.whois_lookup')}}" class="font-weight-medium">{{ __('WHOIS Lookup') }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

