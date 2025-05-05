@section('site_title', formatTitle('Free SSL Checker Tool | Verify SSL Certificate Online | AllToolsFree.com'))
@section('site_description', formatTitle('Check SSL certificate validity, issuer, expiration date & security details for any website. Our free online SSL checker helps identify security issues instantly.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('SSL checker') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('SSL checker') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.ssl_checker') }}" method="post" enctype="multipart/form-data"  @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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
                    <a href="{{ route('tools.ssl_checker') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
                                @if($result->isValid())
                                    <div class="bg-success width-4 height-4 rounded-circle {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}"></div>

                                    <div class="text-truncate">{{ __('Valid') }}</div>
                                @else
                                    <div class="bg-danger width-4 height-4 rounded-circle {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}"></div>

                                    <div class="text-truncate">{{ __('Invalid') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Issuer') }}</div>
                            <div class="col-12 col-lg-8 text-break">{{ $result->getIssuer() }}</div>
                        </div>
                    </div>

                    @if(!empty($result->getOrganization()))
                        <div class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-4 text-break text-muted">{{ __('Organization') }}</div>
                                <div class="col-12 col-lg-8 text-break">{{ $result->getOrganization() }}</div>
                            </div>
                        </div>
                    @endif

                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Signature algorithm') }}</div>
                            <div class="col-12 col-lg-8 text-break">{{ $result->getSignatureAlgorithm() }}</div>
                        </div>
                    </div>

                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Issued date') }}</div>
                            <div class="col-12 col-lg-8 text-break">
                                {{ __(':date at :time (UTC :offset)', ['date' => $result->validFromDate()->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('Y-m-d')), 'time' => $result->validFromDate()->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('H:i:s')), 'offset' => \Carbon\CarbonTimeZone::create((Auth::user()->timezone ?? config('app.timezone')))->toOffsetName()]) }}
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-4 text-break text-muted">{{ __('Expiration date') }}</div>
                            <div class="col-12 col-lg-8 text-break">
                                {{ __(':date at :time (UTC :offset)', ['date' => $result->expirationDate()->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('Y-m-d')), 'time' => $result->expirationDate()->tz(Auth::user()->timezone ?? config('app.timezone'))->format(__('H:i:s')), 'offset' => \Carbon\CarbonTimeZone::create((Auth::user()->timezone ?? config('app.timezone')))->toOffsetName()]) }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif
<div class="card border-0 shadow-sm mt-4 p-3">
    <div class="card-body">
        <h1 class="h3 mb-3">SSL Checker Tool - Free Certificate Analyzer</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">🔒</div>
                <div>Instantly verify your SSL/TLS certificate status, expiration date, and security configuration with our free SSL Checker tool. Ensure your website's HTTPS security meets industry standards.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Results</span>
            <span class="badge badge-info mb-2">✅ No Installation</span>
        </div>

        <h2 class="h4 mb-3">Why Use Our SSL Checker?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🛡️ Security Verification</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Check certificate validity</li>
                            <li class="mb-1">Detect vulnerabilities</li>
                            <li>Verify encryption strength</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📈 SEO Benefits</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Maintain search ranking signals</li>
                            <li>Prevent security warnings</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⏱️ Expiration Monitoring</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Track renewal dates</li>
                            <li>Get expiration alerts</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔍 Detailed Analysis</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">View issuer details</li>
                            <li>Check certificate chain</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Check SSL Certificate</h2>
        
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
                        <td>System initiates SSL handshake</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Our tool analyzes certificate</td>
                        <td>Comprehensive security check</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Review results</td>
                        <td>Get full certificate details</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Key SSL Checker Features</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📅 Expiry Date Check</h3>
                        <p>Prevent website downtime by monitoring certificate expiration dates</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔐 Protocol Support</h3>
                        <p>Verify TLS/SSL protocol versions (1.0, 1.1, 1.2, 1.3)</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🏆 Certificate Authority</h3>
                        <p>Identify issuing CA (Let's Encrypt, DigiCert, etc.)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-danger mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">⚠️ Critical SSL Errors to Fix</h3>
            <ul class="mb-0">
                <li>Expired certificates</li>
                <li>Mismatched domain names</li>
                <li>Weak encryption algorithms</li>
                <li>Incomplete certificate chains</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Who Needs This SSL Checker?</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🌐 Website Owners</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Ensure visitor security</li>
                            <li>Maintain Google rankings</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💻 Developers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Debug HTTPS issues</li>
                            <li>Verify server configurations</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🛒 E-commerce Managers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Protect customer data</li>
                            <li>Maintain PCI compliance</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">Frequently Asked Questions</h2>
        
        <div class="accordion mb-4" id="faqAccordion">
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingOne">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne">
                            What does an SSL Checker do?
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Our tool analyzes your website's SSL/TLS certificate to verify its validity, expiration date, encryption strength, and proper installation.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            How often should I check my SSL certificate?
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ Monthly checks are recommended, with more frequent monitoring as expiration approaches (typically 90 days before expiry).
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            What's the difference between SSL and TLS?
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        TLS is the updated, more secure version of SSL. While people still say "SSL", most certificates now use TLS protocols (1.2 or 1.3).
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h5 mb-3">Explore More Security Tools</h3>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔍</div>
                                    <div class="font-weight-medium">Website Status Checker</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🛡️</div>
                                    <div class="font-weight-medium">HTTP Headers Checker</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🌐</div>
                                    <div class="font-weight-medium">WHOIS Lookup</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>