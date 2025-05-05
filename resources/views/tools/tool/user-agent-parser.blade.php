@section('site_title', formatTitle('Free User-Agent Parser Tool | Decode Browser & Device Info | AllToolsFree.com'))
@section('site_description', formatTitle('Parse and decode any User-Agent string with our free online tool. Identify browsers, devices, operating systems, and more for development and analytics. Instant results, no registration needed.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('User-Agent parser') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('User-Agent parser') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.user_agent_parser') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
            @cannot('tools', ['App\Models\User'])
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
            @endcannot

            @csrf

            <div class="form-group">
                <label for="i-user-agent">{{ __('User-Agent') }}</label>
                <div class="input-group">
                    <input type="text" dir="ltr" name="user_agent" id="i-user-agent" class="form-control{{ $errors->has('user_agent') ? ' is-invalid' : '' }}" value="{{ $userAgent ?? (old('user_agent') ?? request()->header('User-Agent')) }}">
                    <div class="input-group-append">
                        <div class="btn btn-primary" data-tooltip-copy="true" title="{{ __('Copy') }}" data-text-copy="{{ __('Copy') }}" data-text-copied="{{ __('Copied') }}" data-clipboard="true" data-clipboard-target="#i-user-agent">{{ __('Copy') }}</div>
                    </div>
                </div>

                @if ($errors->has('user_agent'))
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first('user_agent') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Parse') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.user_agent_parser') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
            <div class="row mx-n2">
                <div class="col-12 col-md-6 px-2">
                    <div class="form-group">
                        <label for="i-result-browser">{{ __('Browser') }}</label>
                        <input id="i-result-browser" class="form-control" type="text" value="{{ $result->browser->name ?? null }} {{ $result->browser->version->value ?? null }}" readonly>
                    </div>
                </div>

                <div class="col-12 col-md-6 px-2">
                    <div class="form-group">
                        <label for="i-result-operating-system">{{ __('Operating system') }}</label>
                        <input id="i-result-operating-system" class="form-control" type="text" value="{{ $result->os->name ?? null }} {{ $result->os->version->value ?? null }}" readonly>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="i-result-user-agent">{{ __('User-Agent') }}</label>

                <div class="position-relative">
                    <textarea id="i-result-user-agent" class="form-control" onclick="this.select();" readonly>{{ $userAgent ?? null }}</textarea>

                    <div class="position-absolute top-0 right-0">
                        <div class="btn btn-sm btn-primary m-2" data-tooltip-copy="true" title="{{ __('Copy') }}" data-text-copy="{{ __('Copy') }}" data-text-copied="{{ __('Copied') }}" data-clipboard="true" data-clipboard-target="#i-result-user-agent">{{ __('Copy') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="card border-0 shadow-sm mt-4 p-3">
    <div class="card-body">
        <h1 class="h3 mb-3">User-Agent Parser Tool - Decode Browser & Device Signatures</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">🖥️</div>
                <div>Instantly analyze any User-Agent string to identify browsers, operating systems, devices, and more. Essential for web developers, analytics, and security professionals.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Real-Time Analysis</span>
            <span class="badge badge-info mb-2">✅ No Data Storage</span>
        </div>

        <h2 class="h4 mb-3">Why Parse User-Agent Strings?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🌐 Web Analytics</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Understand visitor device distribution</li>
                            <li class="mb-1">Track browser version adoption</li>
                            <li>Segment traffic by OS/platform</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💻 Development</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Test responsive design compatibility</li>
                            <li>Implement browser-specific features</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🛡️ Security</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Detect malicious bots/spiders</li>
                            <li>Identify suspicious traffic patterns</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📱 Device Detection</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Recognize mobile/tablet/desktop</li>
                            <li>Identify specific device models</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Parse User-Agent Strings</h2>
        
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
                        <td>Paste User-Agent string or detect automatically</td>
                        <td>System recognizes UA pattern</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Click "Parse User-Agent"</td>
                        <td>Instant detailed breakdown</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Review comprehensive analysis</td>
                        <td>Export data as needed</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Key Features</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔍 Complete Analysis</h3>
                        <p>Extracts browser, OS, device type, engine, and version details</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📱 Mobile Detection</h3>
                        <p>Identifies smartphones, tablets, and specific device models</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🤖 Bot Recognition</h3>
                        <p>Flags search engine crawlers and automated agents</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Developer Pro Tip</h3>
            <p>For optimal User-Agent handling:</p>
            <ul class="mb-0">
                <li>Always validate UA strings for security</li>
                <li>Use feature detection rather than UA parsing when possible</li>
                <li>Combine with our HTTP headers checker for complete request analysis</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Who Uses This Tool?</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💻 Web Developers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Debug browser-specific issues</li>
                            <li>Implement compatibility workarounds</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📊 Analytics Specialists</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Segment traffic by technology</li>
                            <li>Track device/browser trends</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔒 Security Experts</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Identify malicious traffic</li>
                            <li>Detect spoofed user agents</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">User-Agent Components We Parse</h2>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Component</th>
                        <th>Example</th>
                        <th>Significance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Browser</strong></td>
                        <td>Chrome 120.0</td>
                        <td>Client application and version</td>
                    </tr>
                    <tr>
                        <td><strong>Operating System</strong></td>
                        <td>Windows 10</td>
                        <td>Platform running the browser</td>
                    </tr>
                    <tr>
                        <td><strong>Device Type</strong></td>
                        <td>Mobile (iPhone)</td>
                        <td>Hardware classification</td>
                    </tr>
                    <tr>
                        <td><strong>Rendering Engine</strong></td>
                        <td>WebKit/537.36</td>
                        <td>Underlying page renderer</td>
                    </tr>
                    <tr>
                        <td><strong>Bot/Crawler</strong></td>
                        <td>Googlebot/2.1</td>
                        <td>Identifies automated agents</td>
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
                            What exactly is a User-Agent string?
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        A User-Agent string is a line of text web browsers and applications send to identify themselves to servers. It typically contains information about the browser, operating system, device, and rendering engine.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            Can User-Agent strings be faked?
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ Yes, User-Agent strings can be spoofed, which is why they shouldn't be solely relied upon for security decisions. Our tool helps identify suspicious patterns that may indicate spoofing.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            How often should I update my User-Agent database?
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Our tool maintains an always-updated database of User-Agent patterns. For developers maintaining local databases, we recommend weekly updates to track new browsers and devices.
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h5 mb-3">Explore More Developer Tools</h3>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🌐</div>
                                    <div class="font-weight-medium">HTTP Headers Checker</div>
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
                                    <div class="mb-2">📊</div>
                                    <div class="font-weight-medium">Website Status Checker</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>