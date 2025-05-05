@section('site_title', formatTitle('Free Website Status Checker | Verify Site Uptime & Downtime | AllToolsFree.com'))
@section('site_description', formatTitle('Check if a website is online or down with our free Website Status Checker. Monitor uptime, detect outages, and verify server responses instantly. No registration needed.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Website status checker') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Website status checker') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.website_status_checker') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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
                    <a href="{{ route('tools.website_status_checker') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
            <div class="list-group list-group-flush my-n3">
                <div class="list-group-item px-0">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-4 text-truncate text-muted">{{ __('URL') }}</div>
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
                            @if($result)
                                <div class="bg-success width-4 height-4 rounded-circle {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}"></div>

                                <div class="text-truncate">{{ __('Online') }}</div>
                            @else
                                <div class="bg-danger width-4 height-4 rounded-circle {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}"></div>

                                <div class="text-truncate">{{ __('Offline') }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="list-group-item px-0">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-4 text-truncate text-muted">{{ __('Code') }}</div>
                        <div class="col-12 col-lg-8 text-truncate d-flex align-items-center">{{ $result->getStatusCode() }}</div>
                    </div>
                </div>

                <div class="list-group-item px-0">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-4 text-break text-muted">{{ __('Load time') }}</div>
                        <div class="col-12 col-lg-8 text-break">{{ __(':value seconds', ['value' => number_format($stats['total_time'] ?? 0, 2, __('.'), __(','))]) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="card border-0 shadow-sm mt-4 p-3">
    <div class="card-body">
        <h1 class="h3 mb-3">Website Status Checker - Free Uptime Monitor Tool</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">🌐</div>
                <div>Instantly check if your website is online, measure loading speed, and identify server errors with our free Website Status Checker. Monitor your site's availability 24/7.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Real-Time Results</span>
            <span class="badge badge-info mb-2">✅ Global Checkpoints</span>
        </div>

        <h2 class="h4 mb-3">Why Use Our Website Status Checker?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🚦 Instant Availability Check</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Verify if your website is up or down</li>
                            <li class="mb-1">Detect server outages immediately</li>
                            <li>Monitor HTTP status codes</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⏱️ Performance Metrics</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Measure page load speed</li>
                            <li>Analyze server response time</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🌍 Global Reach Test</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Check accessibility worldwide</li>
                            <li>Identify regional outages</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📊 SEO Impact Analysis</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Prevent ranking drops</li>
                            <li>Maintain crawlability</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Check Website Status</h2>
        
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
                        <td>Enter your website URL (e.g., alltoolsfree.com)</td>
                        <td>System initiates global ping test</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Our tool analyzes server response</td>
                        <td>Comprehensive status check</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Review detailed report</td>
                        <td>Get uptime metrics and diagnostics</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Key Features</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚡ Real-Time Monitoring</h3>
                        <p>Get instant alerts when your site goes down</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📈 Historical Reports</h3>
                        <p>Track uptime/downtime trends over time</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔢 Status Code Analysis</h3>
                        <p>Interpret 200, 404, 500, and other HTTP codes</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-warning mt-4 p-4 shadow-lg">
            <h3 class="h5 mb-3">⚠️ Critical Website Errors to Watch</h3>
            <ul class="mb-0">
                <li>5xx Server Errors</li>
                <li>Connection timeouts</li>
                <li>DNS resolution failures</li>
                <li>SSL certificate errors</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Who Benefits from This Tool?</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💻 Webmasters</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Monitor site availability</li>
                            <li>Quickly diagnose outages</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🛒 E-commerce Owners</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Prevent revenue loss</li>
                            <li>Ensure checkout availability</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔍 SEO Specialists</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Maintain search rankings</li>
                            <li>Ensure crawl accessibility</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">Understanding HTTP Status Codes</h2>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Code</th>
                        <th>Meaning</th>
                        <th>Action Required</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>200 OK</strong></td>
                        <td>Website is functioning normally</td>
                        <td>None</td>
                    </tr>
                    <tr>
                        <td><strong>301/302</strong></td>
                        <td>Redirect in place</td>
                        <td>Check redirect chain</td>
                    </tr>
                    <tr>
                        <td><strong>404</strong></td>
                        <td>Page not found</td>
                        <td>Fix broken links</td>
                    </tr>
                    <tr>
                        <td><strong>500</strong></td>
                        <td>Server error</td>
                        <td>Contact hosting provider</td>
                    </tr>
                    <tr>
                        <td><strong>503</strong></td>
                        <td>Service unavailable</td>
                        <td>Check server maintenance</td>
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
                            How often should I check my website status?
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        For critical sites, monitor continuously. Our tool can alert you instantly when downtime occurs.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            Is this tool really free?
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ Yes! AllToolsFree provides unlimited website checks with no hidden costs.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            What's the difference between downtime and slow loading?
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Downtime means complete unavailability (error codes), while slow loading indicates performance issues that still allow access.
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h5 mb-3">Try Our Related Network Tools</h3>
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
                                    <div class="mb-2">🔒</div>
                                    <div class="font-weight-medium">SSL Checker</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">📡</div>
                                    <div class="font-weight-medium">Ping Test Tool</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>