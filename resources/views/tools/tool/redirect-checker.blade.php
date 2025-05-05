@section('site_title', formatTitle('Free Redirect Checker Tool | Test URL Redirections Online | AllToolsFree.com'))
@section('site_description', formatTitle('Analyze and verify URL redirects with our free online redirect checker. Detect chain redirects, status codes, and final destinations instantly. Essential for SEO audits and website maintenance.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Redirect checker') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Redirect checker') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.redirect_checker') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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
                    <a href="{{ route('tools.redirect_checker') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
                                    <div class="col d-flex align-items-center">
                                        <div class="flex-shrink-0 width-8 {{ (__('lang_dir') == 'rtl' ? 'ml-3' : 'mr-3') }}">#</div>
                                        {{ __('URL') }}
                                    </div>

                                    <div class="col-auto">
                                        {{ __('Status') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto {{ (__('lang_dir') == 'rtl' ? 'text-right' : 'text-left') }}">
                                <div class="invisible btn btn-sm btn-outline-primary">{{ __('Copy') }}</div>
                            </div>
                        </div>
                    </div>

                    @foreach($results as $result)
                        <div class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col text-truncate">
                                    <div class="row text-truncate">
                                        <div class="col d-flex text-truncate">
                                            <div class="text-truncate">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 width-8 text-dark {{ $result['http_code'] == '200' ? 'font-weight-medium' : '' }}">{{ ($loop->index + 1) }}</div>

                                                    <img src="{{ favicon($result['url']) }}" rel="noreferrer" class="flex-shrink-0 width-4 height-4 mx-3">

                                                    <div class="text-truncate">
                                                        <a href="{{ $result['url'] }}" class="{{ $result['http_code'] == '200' ? 'text-dark font-weight-medium' : 'text-secondary' }}" dir="ltr" rel="nofollow noreferrer noopener" target="_blank">{{ $result['url'] }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto d-flex text-truncate {{ (__('lang_dir') == 'rtl' ? 'text-right' : 'text-left') }}">
                                            <span class="{{ $result['http_code'] == '200' ? 'text-success font-weight-medium' : 'text-secondary' }}">{{ $result['http_code'] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="btn btn-sm btn-outline-primary" data-tooltip-copy="true" data-clipboard-copy="{{ $result['url'] }}" title="{{ __('Copy') }}" data-text-copy="{{ __('Copy') }}" data-text-copied="{{ __('Copied') }}">{{ __('Copy') }}</div>
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
        <h1 class="h3 mb-3">Redirect Checker Tool - Analyze URL Redirections Instantly</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">🔄</div>
                <div>Track and analyze HTTP redirect chains to identify SEO issues, broken links, and slow-loading pages. Our free tool reveals every hop in your URL redirection path with detailed status codes.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Analysis</span>
            <span class="badge badge-info mb-2">✅ No Registration</span>
        </div>

        <h2 class="h4 mb-3">Why Check URL Redirects?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📈 SEO Optimization</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Prevent PageRank dilution</li>
                            <li class="mb-1">Fix redirect chains</li>
                            <li>Improve crawl efficiency</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚡ Performance Boost</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Reduce unnecessary hops</li>
                            <li>Eliminate slow redirects</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔍 Technical Audits</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Verify 301 vs 302 redirects</li>
                            <li>Detect redirect loops</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🛠️ Migration Support</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Check domain migrations</li>
                            <li>Validate URL restructuring</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Check Redirect Chains</h2>
        
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
                        <td>Enter URL (http:// or https://)</td>
                        <td>System initiates tracking</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Click "Check Redirects"</td>
                        <td>Full chain analysis begins</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Review detailed report</td>
                        <td>See all hops with status codes</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Key Features</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔗 Full Chain Analysis</h3>
                        <p>Shows every redirect in sequence with HTTP status codes</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⏱️ Load Time Metrics</h3>
                        <p>Measures latency at each redirect step</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📊 SEO Recommendations</h3>
                        <p>Flags problematic redirect patterns</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 SEO Expert Tip</h3>
            <p>For optimal results:</p>
            <ul class="mb-0">
                <li>Limit redirect chains to 3 hops max</li>
                <li>Always use 301 for permanent moves</li>
                <li>Fix any 302s that should be 301s</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Who Needs This Tool?</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔍 SEO Specialists</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Audit website structures</li>
                            <li>Preserve link equity</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💻 Web Developers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Debug rewrite rules</li>
                            <li>Verify .htaccess configurations</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🛒 E-commerce Managers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Check product URL changes</li>
                            <li>Validate campaign tracking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">Redirect Type Comparison</h2>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Status Code</th>
                        <th>Type</th>
                        <th>SEO Impact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>301</strong></td>
                        <td>Permanent</td>
                        <td>Passes 90-99% link equity</td>
                    </tr>
                    <tr>
                        <td><strong>302</strong></td>
                        <td>Temporary</td>
                        <td>Passes little to no equity</td>
                    </tr>
                    <tr>
                        <td><strong>307</strong></td>
                        <td>Temporary (HTTP/1.1)</td>
                        <td>Same as 302 but preserves method</td>
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
                            What's the difference between 301 and 302 redirects?
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        301 indicates a permanent move (best for SEO), while 302 means temporary (no link equity transfer). Our tool helps identify misconfigured redirect types.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            Can I check redirects for multiple URLs at once?
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ Yes! Our bulk redirect checker (premium feature) allows analyzing up to 500 URLs simultaneously with comprehensive reporting.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            How do I fix redirect chains?
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Our reports identify unnecessary hops - simply update your server configuration to point directly to the final destination URL.
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h5 mb-3">Explore More SEO Tools</h3>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔗</div>
                                    <div class="font-weight-medium">URL Parser</div>
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
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔍</div>
                                    <div class="font-weight-medium">HTTP Headers Checker</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>