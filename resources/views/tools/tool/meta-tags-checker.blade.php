@section('site_title', formatTitle('Free Meta Tags Checker | Analyze Website Meta Tags | AllToolsFree.com'))
@section('site_description', formatTitle('Check and analyze meta tags of any website with our free online tool. Get detailed insights on title, description, keywords & other meta tags for better SEO optimization.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Meta tags checker') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Meta tags checker') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.meta_tags_checker') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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
                    <a href="{{ route('tools.meta_tags_checker') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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

                    @foreach($results as $result)
                        <div class="list-group-item px-0">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <code class="code">{{ $result['name'] }}</code>
                                </div>
                                <div class="col-12 col-md-8">
                                    {{ $result['content'] }}
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
        <h3 class="h4 mb-3">Meta Tags Checker - Free Online Tool</h3>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">ℹ️</div>
                <div>Ensure your website's meta tags are perfectly optimized for search engines. Instantly analyze meta titles, descriptions, and other crucial SEO elements.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ No Registration</span>
            <span class="badge badge-info mb-2">✅ Instant Results</span>
        </div>

        <h4 class="h5 mb-3">Why Use Our Meta Tags Checker?</h4>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🔍 Comprehensive Meta Analysis</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Check meta titles and descriptions</li>
                            <li class="mb-1">View keywords and viewport tags</li>
                            <li>Analyze charset and other meta elements</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">📈 SEO Optimization</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Improve search engine rankings</li>
                            <li>Boost click-through rates (CTR)</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">📱 Mobile Friendly</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Check responsive meta tags</li>
                            <li>Ensure proper mobile display</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">⚡ Quick Fixes</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Identify missing tags</li>
                            <li>Spot duplicate content issues</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="h5 mb-3 mt-4">Understanding Meta Tags</h4>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Tag Type</th>
                        <th>Description</th>
                        <th>SEO Importance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Meta Title</strong></td>
                        <td>Page title shown in search results</td>
                        <td>Critical for rankings and CTR</td>
                    </tr>
                    <tr>
                        <td><strong>Meta Description</strong></td>
                        <td>Short page summary in SERPs</td>
                        <td>Influences click-through rates</td>
                    </tr>
                    <tr>
                        <td><strong>Viewport Tag</strong></td>
                        <td>Controls mobile display</td>
                        <td>Essential for mobile SEO</td>
                    </tr>
                    <tr>
                        <td><strong>Charset Tag</strong></td>
                        <td>Defines character encoding</td>
                        <td>Ensures proper text rendering</td>
                    </tr>
                    <tr>
                        <td><strong>Robots Tag</strong></td>
                        <td>Controls search engine crawling</td>
                        <td>Affects indexation</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h4 class="h5 mb-3">Who Benefits from This Tool?</h4>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">👨‍💻 SEO Specialists</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Optimize on-page elements</li>
                            <li>Improve search rankings</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">✍️ Content Writers</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Craft compelling meta descriptions</li>
                            <li>Ensure proper keyword usage</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="h6 mb-3">🌐 Website Owners</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Monitor site-wide meta tags</li>
                            <li>Fix technical SEO issues</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-success mt-4 p-4 shadow-lg">
            <h5 class="h6 mb-3 text-white">Privacy & Security</h5>
            <ul class="list-unstyled mb-0">
                <li class="mb-1 text-white">No data stored - your checks remain private</li>
                <li class="mb-1 text-white">Secure HTTPS encrypted connections</li>
                <li class="text-white">No signup required - completely anonymous</li>
            </ul>
        </div>

        <h4 class="h5 mb-3 mt-4">Frequently Asked Questions</h4>
        
        <div class="accordion mb-4" id="faqAccordion">
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne">
                            What are meta tags?
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Meta tags are HTML elements that provide information about your webpage to search engines and website visitors.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            How long should a meta title be?
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        Ideally under 60 characters to avoid truncation in search results.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            Is this tool really free?
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ Yes! AllToolsFree provides this with no hidden costs.
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="h6 mb-3">Try Our Related Free Tools</h5>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔍</div>
                                    <div class="font-weight-medium">SEO Analyzer</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">📝</div>
                                    <div class="font-weight-medium">Content Checker</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🚀</div>
                                    <div class="font-weight-medium">Website Speed Test</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
