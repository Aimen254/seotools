@section('site_title', formatTitle('Free HTTP Headers Checker Tool | Analyze Website Headers Online | AllToolsFree.com'))
@section('site_description', formatTitle('Check and analyze HTTP headers of any website with our free online tool. Verify security headers, server information, and improve your website performance. Instant results, no registration required.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => route('dashboard'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('HTTP headers checker') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('HTTP headers checker') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.http_headers_checker') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
            @cannot('tools', ['App\Models\User'])
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
            @endcannot

            @csrf

            <div class="form-group">
                <label for="i-url">{{ __('URL') }}</label>
                <input type="text" dir="ltr" name="url" id="i-url" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" value="{{ old('url') ?? ($url ?? null) }}">
                @if ($errors->has('url'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('url') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Analyze') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.http_headers_checker') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
                <div class="list-group list-group-flush my-n3">
                    <div class="list-group-item px-0 text-muted">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        {{ __('Name') }}
                                    </div>

                                    <div class="col-12 col-md-8">
                                        {{ __('Value') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($results as $key => $values)
                        <div class="list-group-item px-0">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <code class="code">{{ $key }}</code> <span class="badge badge-secondary">{{ count($values) }}</span>
                                </div>
                                <div class="col-12 col-md-8">
                                    @foreach($values as $value)
                                        @if($loop->index == 1)
                                            <hr>
                                        @endif
                                        {{ $value }}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endif
<div class="card border-0 shadow-sm mt-4 p-3">
    <div class="card-body">
        <h1 class="h3 mb-3">HTTP Headers Checker Tool - Analyze & Optimize Your Website Headers</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">⚡</div>
                <div>Inspect HTTP response headers in real time to optimize security, performance, and SEO. Verify headers like Content-Type, Cache-Control, HSTS, and more with one click.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Analysis</span>
            <span class="badge badge-info mb-2">✅ No Registration</span>
        </div>

        <h2 class="h4 mb-3">Why Check HTTP Headers?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🛡️ Enhanced Security</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Detect missing security headers</li>
                            <li class="mb-1">Prevent XSS and clickjacking</li>
                            <li>Enforce HTTPS with HSTS</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🚀 Performance Boost</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Optimize caching headers</li>
                            <li>Enable compression</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📈 SEO Benefits</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Improve page speed metrics</li>
                            <li>Meet Google ranking factors</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔧 Debugging Tool</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Inspect API responses</li>
                            <li>Verify redirect chains</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Check HTTP Headers</h2>
        
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
                        <td>Enter your website URL</td>
                        <td>e.g., https://example.com</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Click "Check Headers"</td>
                        <td>Instant header analysis</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Review detailed report</td>
                        <td>With optimization recommendations</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Critical Headers We Check</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔒 Security Headers</h3>
                        <ul class="list-unstyled mb-0 small">
                            <li class="mb-1">Content-Security-Policy</li>
                            <li class="mb-1">X-Frame-Options</li>
                            <li class="mb-1">X-XSS-Protection</li>
                            <li>Strict-Transport-Security</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚡ Performance Headers</h3>
                        <ul class="list-unstyled mb-0 small">
                            <li class="mb-1">Cache-Control</li>
                            <li class="mb-1">ETag</li>
                            <li class="mb-1">Content-Encoding</li>
                            <li>Vary</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🖥️ Content Headers</h3>
                        <ul class="list-unstyled mb-0 small">
                            <li class="mb-1">Content-Type</li>
                            <li class="mb-1">X-Content-Type-Options</li>
                            <li class="mb-1">Content-Length</li>
                            <li>Accept-Ranges</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Security Expert Tip</h3>
            <p>For maximum protection:</p>
            <ul class="mb-0">
                <li>Implement CSP with strict directives</li>
                <li>Set HSTS with max-age ≥ 1 year</li>
                <li>Use X-Frame-Options: DENY</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Who Benefits from This Tool?</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💻 Web Developers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Debug server configurations</li>
                            <li>Verify API responses</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔍 SEO Specialists</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Optimize for Core Web Vitals</li>
                            <li>Improve page speed metrics</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🛡️ Security Teams</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Identify vulnerabilities</li>
                            <li>Harden web applications</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">HTTP Headers Impact Comparison</h2>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Scenario</th>
                        <th>Without Headers</th>
                        <th>With Headers</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Security</strong></td>
                        <td>Vulnerable to attacks</td>
                        <td>Protected against XSS, clickjacking</td>
                    </tr>
                    <tr>
                        <td><strong>Load Time</strong></td>
                        <td>2.4s (uncached)</td>
                        <td>0.8s (proper caching)</td>
                    </tr>
                    <tr>
                        <td><strong>SEO Ranking</strong></td>
                        <td>Average position</td>
                        <td>Top 3 potential</td>
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
                            What are HTTP headers?
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        HTTP headers are metadata sent between a web server and browser, controlling caching, security, content rendering, and more.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            Why are headers important for SEO?
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        Headers like Cache-Control, HSTS, and Content-Encoding impact page speed and security - key ranking factors in Google's algorithm.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            How do I fix missing security headers?
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Our tool highlights missing headers with recommendations. Configure them in your .htaccess (Apache) or server config (Nginx).
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h5 mb-3">Explore More Webmaster Tools</h3>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔍</div>
                                    <div class="font-weight-medium">SSL Checker</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔄</div>
                                    <div class="font-weight-medium">Redirect Checker</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🌐</div>
                                    <div class="font-weight-medium">DNS Lookup</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>