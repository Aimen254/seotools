@section('site_title', formatTitle('Free JSON Validator Tool | Validate & Format JSON Online | AllToolsFree.com'))
@section('site_description', formatTitle('Validate, format, and fix JSON data instantly with our free online JSON validator. Perfect for developers, API work, and data analysis. No registration required - quick and easy JSON validation.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => route('dashboard'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('JSON validator') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('JSON validator') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.json_validator') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
            @cannot('tools', ['App\Models\User'])
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
            @endcannot

            @csrf

            <div class="form-group">
                <label for="i-content">{{ __('Content') }}</label>
                <textarea dir="ltr" rows="5" name="content" id="i-content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}">{{ $content ?? (old('content') ?? '') }}</textarea>
                @if ($errors->has('content'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Validate') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.json_validator') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
                    <textarea rows="5" name="result-content" id="i-result-content" class="form-control is-valid" onclick="this.select();" readonly>{!! json_encode($result, JSON_PRETTY_PRINT) !!}</textarea>

                    <div class="position-absolute top-0 right-0">
                        <div class="btn btn-sm btn-primary m-2" data-tooltip-copy="true" title="{{ __('Copy') }}" data-text-copy="{{ __('Copy') }}" data-text-copied="{{ __('Copied') }}" data-clipboard="true" data-clipboard-target="#i-result-content">{{ __('Copy') }}</div>
                    </div>
                </div>
                <span class="valid-feedback text-break d-block" role="alert">
                    <strong>{{ __('Valid JSON syntax.') }}</strong>
                </span>
            </div>
        </div>
    </div>
@endif
<div class="card border-0 shadow-sm mt-4 p-3">
    <div class="card-body">
        <h1 class="h3 mb-3">JSON Validator Tool - Free Online Syntax Checker</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">⚡</div>
                <div>Validate and format JSON data instantly with our free online validator. Perfect for developers, API testers, and data analysts working with JSON configurations.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Validation</span>
            <span class="badge badge-info mb-2">✅ No Registration</span>
        </div>

        <h2 class="h4 mb-3">Why Validate JSON?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🚀 Error Detection</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Find syntax errors instantly</li>
                            <li class="mb-1">Identify missing commas/brackets</li>
                            <li>Spot incorrect data types</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🧹 Code Formatting</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Beautify minified JSON</li>
                            <li>Proper indentation & spacing</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔒 Data Integrity</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Ensure API compatibility</li>
                            <li>Prevent application crashes</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔄 Schema Validation</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Verify against JSON Schema</li>
                            <li>Check required fields</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Validate JSON</h2>
        
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
                        <td>Paste JSON or upload .json file</td>
                        <td>System analyzes your data structure</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Click "Validate JSON"</td>
                        <td>Instant syntax checking</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>View formatted output</td>
                        <td>Download or copy corrected JSON</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Key Features</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📋 Strict Validation</h3>
                        <p>Checks for RFC 8259 compliance with detailed error messages</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚡ Real-time Checking</h3>
                        <p>Validates as you type with instant feedback</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📤 Multiple Formats</h3>
                        <p>Export as formatted, minified, or CSV</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Developer Pro Tip</h3>
            <p>For production-ready JSON:</p>
            <ul class="mb-0">
                <li>Always validate before deployment</li>
                <li>Use our JSON to XML converter when needed</li>
                <li>Combine with our API testing tools</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Who Uses JSON Validator?</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💻 Backend Developers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Debug API responses</li>
                            <li>Test webhook payloads</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📱 Frontend Engineers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Verify AJAX responses</li>
                            <li>Format configuration files</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📊 Data Analysts</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Clean datasets</li>
                            <li>Prepare data for visualization</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">JSON Validation Results</h2>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Validation Status</th>
                        <th>Error Type</th>
                        <th>Our Solution</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Invalid JSON</strong></td>
                        <td>Missing comma</td>
                        <td>Pinpoints exact location with fix suggestion</td>
                    </tr>
                    <tr>
                        <td><strong>Malformed JSON</strong></td>
                        <td>Unclosed brackets</td>
                        <td>Highlights nesting errors visually</td>
                    </tr>
                    <tr>
                        <td><strong>Valid JSON</strong></td>
                        <td>N/A</td>
                        <td>Beautifully formats with indentation</td>
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
                            What JSON standards does this validator support?
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Our tool validates against RFC 8259 (JSON Standard) and ECMA-404 specifications, with options for strict mode validation.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            Can I validate JSON against a schema?
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ Yes! Paste both your JSON and JSON Schema to validate structure, required fields, and data types.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            Does this tool store my JSON data?
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Never! All validation happens in your browser - we don't send your data to our servers, ensuring complete privacy.
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
                                    <div class="mb-2">📜</div>
                                    <div class="font-weight-medium">JS Minifier</div>
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
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔐</div>
                                    <div class="font-weight-medium">MD5 Generator</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
