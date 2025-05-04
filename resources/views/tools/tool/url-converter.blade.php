@section('site_title', formatTitle('Free URL Converter Tool | Encode/Decode URLs Online | AllToolsFree.com'))
@section('site_description', formatTitle('Quickly encode or decode URLs with our free online URL converter tool. Perfect for developers, marketers & SEO professionals working with web addresses. No registration required.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => route('dashboard'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('URL converter') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('URL converter') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.url_converter') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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

            <div class="form-group">
                <div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="i-type-sentence-case" name="type" class="custom-control-input{{ $errors->has('type') ? ' is-invalid' : '' }}" value="encode" @if ((old('type') !== null && old('type') == 'encode') || (isset($type) && $type == 'encode' && old('type') == null)) checked @endif>
                        <label class="custom-control-label" for="i-type-sentence-case">{{ __('Encode') }}</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="i-type-decode-case" name="type" class="custom-control-input{{ $errors->has('type') ? ' is-invalid' : '' }}" value="decode" @if ((old('type') !== null && old('type') == 'decode') || (isset($type) && $type == 'decode' && old('type') == null)) checked @endif>
                        <label class="custom-control-label" for="i-type-decode-case">{{ __('Decode') }}</label>
                    </div>
                </div>

                @if ($errors->has('type'))
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first('type') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Convert') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.url_converter') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
        <h1 class="h3 mb-3">🌐 Free Online URL Converter Tool</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">✏️</div>
                <div>Instantly encode, decode, and transform URLs for web development, SEO, and data security. Perfect for developers, marketers, and IT professionals.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Bulk Processing</span>
            <span class="badge badge-info mb-2">✅ Secure & Private</span>
        </div>

        <h2 class="h4 mb-3">Why Use the URL Converter Tool?</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚡ URL Encoding/Decoding</h3>
                        <p>Convert special characters (e.g., spaces to %20) for web-safe links and APIs.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🎯 SEO Optimization</h3>
                        <p>Fix malformed URLs that hurt search rankings and user experience.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔐 Data Security</h3>
                        <p>Encode sensitive URLs to prevent tampering or phishing attacks.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mt-4 mb-3">Tool Features</h2>
        <ul class="list-unstyled">
            <li>✅ URL Encode/Decode (RFC 3986 compliant)</li>
            <li>🔄 Base64 URL conversion</li>
            <li>🔗 Absolute ↔ Relative URL transforms</li>
            <li>📊 Batch process 100+ URLs at once</li>
        </ul>

        <h2 class="h4 mt-4 mb-3">Use Cases</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">👩💻 Developers</h3>
                        <p>Prepare URLs for API requests, JavaScript, and database storage.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">📈 SEO Specialists</h3>
                        <p>Canonicalize URLs and fix 404 errors from malformed links.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">📧 Marketers</h3>
                        <p>Encode UTM parameters for clean campaign tracking links.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mt-4 mb-3">How to Convert URLs</h2>
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Step</th>
                        <th>Action</th>
                        <th>Example</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Paste your URL</td>
                        <td><code>https://example.com/?query=hello world</code></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Select conversion type</td>
                        <td>Encode → <code>hello%20world</code></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Copy/download result</td>
                        <td>Ready for use in code or analytics</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Pro Tips</h3>
            <ul class="mb-0">
                <li>Encode spaces as <code>%20</code> (not <code>+</code>) for APIs</li>
                <li>Combine with <a href="#" class="text-white font-weight-bold">UTM Builder</a> for campaign links</li>
                <li>Decode URLs before analyzing traffic data</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Advanced Functionality</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔗 Absolute vs. Relative</h3>
                        <p>Convert <code>/blog/post</code> → <code>https://site.com/blog/post</code></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📦 Batch Processing</h3>
                        <p>Upload a CSV to encode/decode 1000+ URLs in one click.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mt-4 mb-3">Why Choose AllToolsFree?</h2>
        <ul class="list-unstyled">
            <li>🔓 No ads or paywalls</li>
            <li>⚙️ API access for developers</li>
            <li>📁 Supports TXT/CSV file uploads</li>
        </ul>

        <h2 class="h4 mt-4 mb-3">Part of the AllToolsFree Suite</h2>
        <div class="row">
            <div class="col-md-4 mb-2">
                <a href="#" class="text-dark d-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-2">🔠</div>
                            <div class="font-weight-medium">UTM Builder</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="#" class="text-dark d-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-2">✂️</div>
                            <div class="font-weight-medium">URL Parser</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="#" class="text-dark d-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-2">📝</div>
                            <div class="font-weight-medium">Redirect Checker</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <p class="mt-4 small text-muted">
            Keywords: URL encoder, URL decoder, free URL converter, encode spaces in URL, URL percent encoding, web URL tools, RFC 3986 converter.
        </p>
    </div>
</div>