@section('site_title', formatTitle('Free Text to Slug Converter | URL-Friendly Slug Generator | AllToolsFree.com'))
@section('site_description', formatTitle('Convert any text to SEO-friendly URL slugs instantly with our free online tool. Perfect for bloggers, content creators & developers. Create clean, readable slugs for better search engine visibility.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Text to slug converter') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Text to slug converter') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.text_to_slug_converter') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
            @cannot('tools', ['App\Models\User'])
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
            @endcannot

            @csrf

            <div class="form-group">
                <label for="i-content">{{ __('Content') }}</label>
                <textarea name="content" dir="ltr" id="i-content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}">{{ $content ?? (old('content') ?? '') }}</textarea>
                @if ($errors->has('content'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Convert') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.text_to_slug_converter') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
                    <textarea name="result-content" id="i-result-content" class="form-control" onclick="this.select();"
                              readonly>{{ $result }}</textarea>

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
        <h1 class="h3 mb-3">🔗 Free Online Text to Slug Converter</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">✏️</div>
                <div>Instantly convert text into SEO-friendly URL slugs. Perfect for bloggers, developers, and marketers.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Conversion</span>
            <span class="badge badge-info mb-2">✅ Secure & Private</span>
        </div>

        <h2 class="h4 mb-3">Why Use the Text to Slug Converter?</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚡ SEO Optimization</h3>
                        <p>Generate hyphenated, lowercase slugs that boost search rankings.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🎯 Bulk Processing</h3>
                        <p>Convert 1000+ words in seconds—ideal for e-commerce or blogs.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🌐 Multilingual Support</h3>
                        <p>Works with English, Arabic, Spanish, and special characters.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mt-4 mb-3">Tool Features</h2>
        <ul class="list-unstyled">
            <li>✅ Converts spaces to hyphens (-)</li>
            <li>🔄 Removes special characters (@, !, #)</li>
            <li>🔐 Forces lowercase for consistency</li>
            <li>📱 Real-time preview as you type</li>
        </ul>

        <h2 class="h4 mt-4 mb-3">Use Cases</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">👩💻 Bloggers</h3>
                        <p>Optimize post URLs for better click-through rates.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">✍️ Developers</h3>
                        <p>Generate slugs for APIs or dynamic routing.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">📈 SEO Specialists</h3>
                        <p>Audit and fix poorly structured URLs.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mt-4 mb-3">How to Use</h2>
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
                        <td>Paste your text (e.g., "Best SEO Tools 2024")</td>
                        <td>Input appears in the text box</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Click "Convert to Slug"</td>
                        <td>Output: <code>best-seo-tools-2024</code></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Copy/download result</td>
                        <td>Slug ready for URLs or filenames</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Pro Tips</h3>
            <ul class="mb-0">
                <li>Keep slugs under 60 characters for SEO</li>
                <li>Combine with <a href="#" class="text-white font-weight-bold">Case Converter</a> for uniformity</li>
                <li>Remove stop words (the, and) for brevity</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Why Choose AllToolsFree?</h2>
        <ul class="list-unstyled">
            <li>🔓 No registration required</li>
            <li>⚙️ API integration available</li>
            <li>♾️ Unlimited free usage</li>
        </ul>

        <h2 class="h4 mt-4 mb-3">Part of the AllToolsFree Suite</h2>
        <div class="row">
            <div class="col-md-4 mb-2">
                <a href="#" class="text-dark d-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-2">🔠</div>
                            <div class="font-weight-medium">Case Converter</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="#" class="text-dark d-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-2">✂️</div>
                            <div class="font-weight-medium">Text Cleaner</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="#" class="text-dark d-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-2">📝</div>
                            <div class="font-weight-medium">Word Counter</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <p class="mt-4 small text-muted">
            Keywords: URL slug generator, SEO-friendly URLs, free slug converter, text to URL converter, best slug generator, WordPress slug tool.
        </p>
    </div>
</div>