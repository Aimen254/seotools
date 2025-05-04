@section('site_title', formatTitle('Free WHOIS Lookup Tool | Check Domain Ownership & Details | AllToolsFree.com'))  
@section('site_description', formatTitle('Instantly perform a WHOIS lookup to check domain registration details, ownership, expiry dates & more. Our free tool provides accurate, real-time data for any domain—no registration needed.'))  

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => route('dashboard'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('WHOIS lookup') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('WHOIS lookup') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.whois_lookup') }}" method="post" enctype="multipart/form-data" id="whois-lookup-form" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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
                    @if(config('settings.captcha_driver'))
                        <x-captcha-js lang="{{ __('lang_code') }}"></x-captcha-js>

                        <x-captcha-button form-id="whois-lookup-form" class="btn {{ $errors->has(formatCaptchaFieldName()) ? 'btn-danger' : 'btn-primary' }}" data-sitekey="{{ config('settings.captcha_site_key') }}" data-theme="{{ (config('settings.dark_mode') == 1 ? 'dark' : 'light') }}">{{ __('Search') }}</x-captcha-button>

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
                    <a href="{{ route('tools.whois_lookup') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
            @else
                <div class="list-group list-group-flush my-n3">
                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Domain') }}</div>
                            <div class="col-12 col-lg-8 text-break d-flex align-items-center">
                                <img src="{{ favicon($result->domainName) }}" rel="noreferrer" class="width-4 height-4 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">
                                <span dir="ltr">{{ $result->domainName }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Registrar') }}</div>
                            <div class="col-12 col-lg-8 text-break">{{ $result->registrar }}</div>
                        </div>
                    </div>

                    @if($result->owner)
                        <div class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-4 text-break text-muted">{{ __('Registrant') }}</div>
                                <div class="col-12 col-lg-8 text-break">{{ $result->owner }}</div>
                            </div>
                        </div>
                    @endif

                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Created date') }}</div>
                            <div class="col-12 col-lg-8 text-break">
                                {{ __(':date at :time (UTC :offset)', ['date' => \Carbon\Carbon::createFromTimestamp($result->creationDate)->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('Y-m-d')), 'time' => \Carbon\Carbon::createFromTimestamp($result->creationDate)->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('H:i:s')), 'offset' => \Carbon\CarbonTimeZone::create((Auth::user()->timezone ?? config('app.timezone')))->toOffsetName()]) }}
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Updated date') }}</div>
                            <div class="col-12 col-lg-8 text-break">
                                {{ __(':date at :time (UTC :offset)', ['date' => \Carbon\Carbon::createFromTimestamp($result->updatedDate)->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('Y-m-d')), 'time' => \Carbon\Carbon::createFromTimestamp($result->updatedDate)->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('H:i:s')), 'offset' => \Carbon\CarbonTimeZone::create((Auth::user()->timezone ?? config('app.timezone')))->toOffsetName()]) }}
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Expiration date') }}</div>
                            <div class="col-12 col-lg-8 text-break">
                                {{ __(':date at :time (UTC :offset)', ['date' => \Carbon\Carbon::createFromTimestamp($result->expirationDate)->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('Y-m-d')), 'time' => \Carbon\Carbon::createFromTimestamp($result->expirationDate)->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('H:i:s')), 'offset' => \Carbon\CarbonTimeZone::create((Auth::user()->timezone ?? config('app.timezone')))->toOffsetName()]) }}
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Name servers') }}</div>
                            <div class="col-12 col-lg-8 text-break">
                                @foreach($result->nameServers as $nameServer)
                                    <div class="text-break {{ !$loop->first ? 'mt-1' : '' }}">
                                        {{ $nameServer }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('States') }}</div>
                            <div class="col-12 col-lg-8 text-break">
                                @foreach($result->states as $state)
                                    <div class="text-break {{ !$loop->first ? 'mt-1' : '' }}">
                                        {{ $state }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    @if($result->whoisServer)
                        <div class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-4 text-break text-muted">{{ __('WHOIS server') }}</div>
                                <div class="col-12 col-lg-8 text-break">{{ $result->whoisServer }}</div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
@endif
<div class="card border-0 shadow-sm mt-4 p-3">
    <div class="card-body">
        <h1 class="h3 mb-3">WHOIS Lookup Tool - Free Domain Information Checker</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">🔍</div>
                <div>Instantly reveal domain registration details, ownership information, and expiration dates with our free WHOIS lookup service. Track any domain's complete history in seconds.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Results</span>
            <span class="badge badge-info mb-2">✅ No Registration</span>
        </div>

        <h2 class="h4 mb-3">Why Use Our WHOIS Lookup Tool?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🏷️ Domain Ownership</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Identify domain registrants</li>
                            <li class="mb-1">View contact details</li>
                            <li>Discover registration dates</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⏳ Expiration Tracking</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Check domain expiry dates</li>
                            <li>Monitor renewal periods</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🛡️ Security Research</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Investigate suspicious sites</li>
                            <li>Verify business legitimacy</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">💼 Competitive Analysis</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Research competitor domains</li>
                            <li>Analyze industry trends</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Perform a WHOIS Lookup</h2>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Step</th>
                        <th>Action</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Enter domain name (e.g., alltoolsfree.com)</td>
                        <td>System queries global WHOIS databases</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Our tool processes registration records</td>
                        <td>Comprehensive data retrieval</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Review detailed report</td>
                        <td>Get full domain ownership history</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Key WHOIS Data Points</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📅 Registration Dates</h3>
                        <p>Creation, expiration, and last update timestamps</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👤 Registrant Info</h3>
                        <p>Name, organization, and contact details (when public)</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🏢 Registrar Data</h3>
                        <p>Hosting provider and nameserver information</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-dark mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">ℹ️ Understanding Privacy Protection</h3>
            <p>Many domains now hide personal details through:</p>
            <ul class="mb-0">
                <li>WHOIS privacy services</li>
                <li>GDPR-protected registrations</li>
                <li>Proxy registration data</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Who Uses WHOIS Lookup?</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🌐 Domain Investors</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Research available domains</li>
                            <li>Track expiration opportunities</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🛡️ Cybersecurity Pros</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Investigate phishing sites</li>
                            <li>Trace malicious domains</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📈 SEO Specialists</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Analyze competitor assets</li>
                            <li>Research backlink sources</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">Understanding WHOIS Records</h2>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Field</th>
                        <th>Description</th>
                        <th>Importance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Domain Status</strong></td>
                        <td>Active, expired, or pending transfer</td>
                        <td>Determines availability</td>
                    </tr>
                    <tr>
                        <td><strong>Registrar</strong></td>
                        <td>Company managing the registration</td>
                        <td>Contact point for issues</td>
                    </tr>
                    <tr>
                        <td><strong>Name Servers</strong></td>
                        <td>DNS servers hosting the domain</td>
                        <td>Technical configuration</td>
                    </tr>
                    <tr>
                        <td><strong>Registrant</strong></td>
                        <td>Legal owner (when visible)</td>
                        <td>Ownership verification</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Frequently Asked Questions</h2>
        
        <div class="accordion mb-4" id="faqAccordion">
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingOne">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne">
                            Why are some WHOIS details private?
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Many registrars offer privacy protection to shield personal data from public view, especially after GDPR regulations.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            Is WHOIS lookup legal?
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ Yes! WHOIS data is publicly available information, though privacy laws may limit some details.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            How often is WHOIS data updated?
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Registrars typically update records in real-time when changes occur, but propagation may take 24-48 hours.
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h5 mb-3">Explore More Domain Tools</h3>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔗</div>
                                    <div class="font-weight-medium">DNS Lookup</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🌐</div>
                                    <div class="font-weight-medium">Domain Age Checker</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔍</div>
                                    <div class="font-weight-medium">Reverse IP Lookup</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>