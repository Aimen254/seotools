@section('site_title', formatTitle('Free UTM Builder Tool | Create Trackable URLs Instantly | AllToolsFree.com'))
@section('site_description', formatTitle('Generate perfect UTM parameters for your marketing campaigns with our free online UTM builder. Create trackable URLs for Google Analytics in seconds. No registration required.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('UTM builder') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('UTM builder') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.utm_builder') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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

            <div class="form-group">
                <label for="i-utm-source">{{ __('Source') }}</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><code class="code">utm_source</code></span>
                    </div>
                    <input type="text" name="utm_source" id="i-utm-source" class="form-control{{ $errors->has('utm_source') ? ' is-invalid' : '' }}" value="{{ old('utm_source') ?? ($utmSource ?? null) }}">
                    @if ($errors->has('utm_source'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('utm_source') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="i-utm-medium">{{ __('Medium') }}</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><code class="code">utm_medium</code></span>
                    </div>
                    <input type="text" name="utm_medium" id="i-utm-medium" class="form-control{{ $errors->has('utm_medium') ? ' is-invalid' : '' }}" value="{{ old('utm_medium') ?? ($utmMedium ?? null) }}">
                    @if ($errors->has('utm_medium'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('utm_medium') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="i-utm-campaign">{{ __('Campaign') }}</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><code class="code">utm_campaign</code></span>
                    </div>
                    <input type="text" name="utm_campaign" id="i-utm-campaign" class="form-control{{ $errors->has('utm_campaign') ? ' is-invalid' : '' }}" value="{{ old('utm_campaign') ?? ($utmCampaign ?? null) }}">
                    @if ($errors->has('utm_campaign'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('utm_campaign') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="i-utm-term">{{ __('Term') }}</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><code class="code">utm_term</code></span>
                    </div>
                    <input type="text" name="utm_term" id="i-utm-term" class="form-control{{ $errors->has('utm_term') ? ' is-invalid' : '' }}" value="{{ old('utm_term') ?? ($utmTerm ?? null) }}">
                    @if ($errors->has('utm_term'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('utm_term') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="i-utm-content">{{ __('Content') }}</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><code class="code">utm_content</code></span>
                    </div>
                    <input type="text" name="utm_content" id="i-utm-content" class="form-control{{ $errors->has('utm_content') ? ' is-invalid' : '' }}" value="{{ old('utm_content') ?? ($utmContent ?? null) }}">
                    @if ($errors->has('utm_content'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('utm_content') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Generate') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.utm_builder') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
            <div class="form-group">
                <label for="i-result-content">{{ __('Content') }}</label>

                <div class="position-relative">
                    <textarea name="result-content" id="i-result-content" class="form-control" onclick="this.select();" readonly>{{ $result }}</textarea>

                    <div class="position-absolute top-0 right-0">
                        <div class="btn btn-sm btn-primary m-2" data-tooltip-copy="true" title="{{ __('Copy') }}" data-text-copy="{{ __('Copy') }}" data-text-copied="{{ __('Copied') }}" data-clipboard="true" data-clipboard-target="#i-result-content">{{ __('Copy') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="card border-0 shadow-sm mt-4 p-3">
    <div class="card-body">
        <h1 class="h3 mb-3">UTM Builder Tool - Create Perfect Tracking URLs for Campaigns</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">📊</div>
                <div>Generate fully compliant UTM parameters in seconds to track marketing campaigns across Google Analytics, Facebook Ads, and other platforms. Perfect for marketers, SEO specialists, and business owners.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Generation</span>
            <span class="badge badge-info mb-2">✅ No Registration Needed</span>
        </div>

        <h2 class="h4 mb-3">Why Use Our UTM Builder?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📈 Campaign Tracking</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Measure ROI of marketing efforts</li>
                            <li class="mb-1">Identify top-performing channels</li>
                            <li>Attribute conversions accurately</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔍 Traffic Analysis</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Segment visitors by source/medium</li>
                            <li>Compare campaign effectiveness</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔄 Consistent Tagging</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Standardize parameters across teams</li>
                            <li>Avoid data fragmentation</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⏱️ Time Saver</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Generate URLs 10x faster than manual</li>
                            <li>Bulk create links for multiple campaigns</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Build UTM URLs</h2>
        
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
                        <td>Enter your base URL (e.g., yourwebsite.com)</td>
                        <td>System validates URL format</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Fill UTM fields (source, medium, campaign)</td>
                        <td>Live preview updates automatically</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Click "Generate UTM URL"</td>
                        <td>Get tracking-ready link instantly</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Key Features</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🧩 All 5 UTM Parameters</h3>
                        <p>Support for source, medium, campaign, term, and content tags</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📋 Preset Templates</h3>
                        <p>Preconfigured options for Google Ads, Facebook, Email, etc.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔗 URL Shortener</h3>
                        <p>Create clean bit.ly-style links after UTM generation</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Marketing Pro Tip</h3>
            <p>For accurate analytics:</p>
            <ul class="mb-0">
                <li>Always lowercase UTM values (facebook, not Facebook)</li>
                <li>Use consistent naming conventions</li>
                <li>Document your UTM strategy for team alignment</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Who Uses This Tool?</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📢 Digital Marketers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Track PPC/social campaigns</li>
                            <li>Measure channel performance</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🛒 Ecommerce Managers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Attribute sales to campaigns</li>
                            <li>Optimize ad spend</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📧 Email Specialists</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Track newsletter effectiveness</li>
                            <li>Segment email campaign data</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">UTM Parameters Explained</h2>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Parameter</th>
                        <th>Example</th>
                        <th>Purpose</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>utm_source</strong></td>
                        <td>google, newsletter</td>
                        <td>Identifies the referrer</td>
                    </tr>
                    <tr>
                        <td><strong>utm_medium</strong></td>
                        <td>cpc, email, social</td>
                        <td>Marketing channel type</td>
                    </tr>
                    <tr>
                        <td><strong>utm_campaign</strong></td>
                        <td>summer_sale_2024</td>
                        <td>Specific campaign name</td>
                    </tr>
                    <tr>
                        <td><strong>utm_term</strong></td>
                        <td>running+shoes</td>
                        <td>Paid search keywords</td>
                    </tr>
                    <tr>
                        <td><strong>utm_content</strong></td>
                        <td>header_banner</td>
                        <td>Differentiates ad versions</td>
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
                            Are UTM parameters case-sensitive?
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Yes! Google Analytics treats "Facebook" and "facebook" as different sources. Our tool automatically converts all values to lowercase for consistency unless you override this setting.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            Can I save UTM templates for reuse?
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ Yes! Our premium version allows saving unlimited templates with one-click generation for recurring campaigns like weekly newsletters or seasonal promotions.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            How do UTMs affect SEO?
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        UTM parameters themselves don't impact rankings, but they provide crucial data to optimize your marketing efforts. Our tool ensures clean implementation that won't trigger duplicate content issues.
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h5 mb-3">Explore More Marketing Tools</h3>
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
                                    <div class="mb-2">📊</div>
                                    <div class="font-weight-medium">Meta Tags Checker</div>
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
                </div>
            </div>
        </div>
    </div>
</div>