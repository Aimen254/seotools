@section('site_title', formatTitle('Free URL Parser | Extract & Analyze URL Components | AllToolsFree.com'))
@section('site_description', formatTitle('Parse any URL instantly with our free online tool. Extract protocol, domain, path, parameters & more. Essential for developers, SEOs & digital marketers. No registration required.'))
@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('URL parser') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('URL parser') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.url_parser') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
            @cannot('tools', ['App\Models\User'])
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
            @endcannot

            @csrf

            <div class="form-group">
                <label for="i-url">{{ __('URL') }}</label>
                <input type="text" dir="ltr" name="url" id="i-url" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" value="{{ $url ?? (old('url') ?? '') }}">
                @if ($errors->has('url'))
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first('url') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Parse') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.url_parser') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
                    @foreach($results as $key => $value)
                        <div class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-4 text-break"><code>{{ $key }}</code></div>
                                <div class="col-12 col-lg-8 text-break">{{ $value }}</div>
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
        <h1 class="h3 mb-3">URL Parser Tool - Analyze & Deconstruct Web Addresses</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">🔗</div>
                <div>Break down any URL into its core components with our free online parser. Extract domains, paths, parameters, and fragments instantly for web development, SEO, and analytics.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Analysis</span>
            <span class="badge badge-info mb-2">✅ No Registration</span>
        </div>

        <h2 class="h4 mb-3">Why Use a URL Parser?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔍 SEO Optimization</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Analyze competitor URL structures</li>
                            <li class="mb-1">Extract keywords from paths</li>
                            <li>Optimize parameter handling</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💻 Development</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Debug web applications</li>
                            <li>Extract specific URL components</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📊 Analytics</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Process large URL datasets</li>
                            <li>Normalize URLs for tracking</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🛡️ Security</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Inspect suspicious links</li>
                            <li>Validate URL structures</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Parse URLs</h2>
        
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
                        <td>Paste URL or enter manually</td>
                        <td>System detects URL pattern</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Click "Parse URL"</td>
                        <td>Instant component breakdown</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Review detailed analysis</td>
                        <td>Copy specific elements as needed</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Key Features</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🧩 Full Deconstruction</h3>
                        <p>Extracts protocol, domain, path, query strings, and fragments</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔗 URL Encoding</h3>
                        <p>Decodes percent-encoded characters automatically</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📋 Parameter Analysis</h3>
                        <p>Lists all query parameters with values</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Developer Pro Tip</h3>
            <p>For clean URL handling:</p>
            <ul class="mb-0">
                <li>Always normalize URLs before comparison</li>
                <li>Use our tool to test edge cases</li>
                <li>Combine with our URL converter for transformations</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Who Uses This Tool?</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔍 SEO Specialists</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Analyze site architecture</li>
                            <li>Optimize internal linking</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💻 Web Developers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Debug routing issues</li>
                            <li>Extract URL parameters</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📈 Digital Marketers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Analyze campaign URLs</li>
                            <li>Track UTM parameters</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">URL Components We Parse</h2>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Component</th>
                        <th>Example</th>
                        <th>Purpose</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Protocol</strong></td>
                        <td>https://</td>
                        <td>Transfer method (HTTP/HTTPS)</td>
                    </tr>
                    <tr>
                        <td><strong>Domain</strong></td>
                        <td>example.com</td>
                        <td>Website address</td>
                    </tr>
                    <tr>
                        <td><strong>Path</strong></td>
                        <td>/products/page.html</td>
                        <td>Resource location</td>
                    </tr>
                    <tr>
                        <td><strong>Query</strong></td>
                        <td>?id=123&sort=price</td>
                        <td>Parameters for dynamic content</td>
                    </tr>
                    <tr>
                        <td><strong>Fragment</strong></td>
                        <td>#section1</td>
                        <td>Page section anchor</td>
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
                            What's the difference between absolute and relative URLs?
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Absolute URLs contain all components (protocol + domain + path), while relative URLs only specify paths. Our tool automatically resolves relative URLs when provided with a base URL.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            Can I parse multiple URLs at once?
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ Yes! Our premium version supports bulk URL parsing with CSV export capabilities - perfect for analyzing large datasets.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            How does this help with SEO?
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Our tool helps identify duplicate content issues from URL parameters, analyze keyword placement in paths, and ensure clean URL structures that search engines prefer.
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h5 mb-3">Explore More URL Tools</h3>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔗</div>
                                    <div class="font-weight-medium">URL Shortener</div>
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
                                    <div class="mb-2">📊</div>
                                    <div class="font-weight-medium">UTM Builder</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>