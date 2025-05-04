@section('site_title', formatTitle('Binary Converter Tool - Instant Text/Binary Conversion | AllToolsFree.com'))
@section('site_description', formatTitle('Free online binary converter tool that instantly translates between binary code and text. Perfect for developers, students, and tech enthusiasts. No registration required - try our 50+ free tools today!'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => route('dashboard'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Binary converter') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Binary converter') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.binary_converter') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
            @cannot('tools', ['App\Models\User'])
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
            @endcannot

            @csrf

            <div class="form-group">
                <label for="i-content">{{ __('Content') }}</label>
                <textarea name="content" id="i-content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}">{{ $content ?? (old('content') ?? '') }}</textarea>
                @if ($errors->has('content'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="i-type-sentence-case" name="type" class="custom-control-input{{ $errors->has('type') ? ' is-invalid' : '' }}" value="binary" @if ((old('type') !== null && old('type') == 'binary') || (isset($type) && $type == 'binary' && old('type') == null)) checked @endif>
                        <label class="custom-control-label" for="i-type-sentence-case">{{ __('Text to binary') }}</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="i-type-text-case" name="type" class="custom-control-input{{ $errors->has('type') ? ' is-invalid' : '' }}" value="text" @if ((old('type') !== null && old('type') == 'text') || (isset($type) && $type == 'text' && old('type') == null)) checked @endif>
                        <label class="custom-control-label" for="i-type-text-case">{{ __('Binary to text') }}</label>
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
                    <a href="{{ route('tools.binary_converter') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
                    <textarea id="i-result-content" class="form-control" onclick="this.select();" readonly>{{ $result }}</textarea>

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
        <h1 class="h3 mb-3">Binary Converter Tool - Translate Between Binary and Text Instantly</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">🔢</div>
                <div>Convert text to binary code and binary back to readable text with our free online converter. Essential for programmers, students, and computer science enthusiasts.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Conversion</span>
            <span class="badge badge-info mb-2">✅ No Installation</span>
        </div>

        <h2 class="h4 mb-3">Why Use Our Binary Converter?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">💻 Programming</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Debug binary data streams</li>
                            <li class="mb-1">Understand low-level data representation</li>
                            <li>Test bitwise operations</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🎓 Education</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Learn binary number system</li>
                            <li>Visualize text encoding</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔒 Security</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Analyze binary payloads</li>
                            <li>Decode obfuscated messages</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚡ Efficiency</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Convert large texts instantly</li>
                            <li>Save manual calculation time</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Use Binary Converter</h2>
        
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
                        <td>Paste text or binary code</td>
                        <td>System detects input type</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Select conversion direction</td>
                        <td>Tool prepares translation</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Click "Convert"</td>
                        <td>Instant binary/text result</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Key Features</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔄 Bidirectional</h3>
                        <p>Convert text-to-binary and binary-to-text with perfect accuracy</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📋 Character Encoding</h3>
                        <p>Supports ASCII, UTF-8, and Unicode standards</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔍 Detailed Analysis</h3>
                        <p>Shows byte-by-byte conversion breakdown</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Developer Pro Tip</h3>
            <p>For effective binary conversion:</p>
            <ul class="mb-0">
                <li>Use spaces between bytes for readability (01000001 01000010)</li>
                <li>Combine with our ASCII table for reference</li>
                <li>Check encoding when converting special characters</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Who Uses This Tool?</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💻 Software Developers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Debug low-level data</li>
                            <li>Work with binary protocols</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🖥️ CS Students</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Learn binary representation</li>
                            <li>Complete programming assignments</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔐 Security Experts</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Analyze binary exploits</li>
                            <li>Decode forensic evidence</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">Conversion Examples</h2>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Text</th>
                        <th>Binary Equivalent</th>
                        <th>Encoding Standard</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>A</td>
                        <td>01000001</td>
                        <td>ASCII</td>
                    </tr>
                    <tr>
                        <td>Hello</td>
                        <td>01001000 01100101 01101100 01101100 01101111</td>
                        <td>UTF-8</td>
                    </tr>
                    <tr>
                        <td>123</td>
                        <td>00110001 00110010 00110011</td>
                        <td>ASCII</td>
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
                            What's the difference between binary and ASCII?
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Binary is the base-2 number system computers use internally. ASCII is a character encoding standard that maps text characters to binary numbers (e.g., 'A' = 01000001). Our tool handles this conversion automatically.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            Can I convert special characters and emojis?
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ Yes! Our tool supports Unicode encoding which can handle all special characters, non-Latin scripts, and emojis (e.g., 😊 = 11110000 10011111 10011000 10001010 in UTF-8).
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            How accurate is the binary conversion?
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Our tool provides 100% accurate conversions using standardized encoding schemes. Each character is converted to its exact binary representation according to the selected encoding standard.
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h5 mb-3">Explore More Conversion Tools</h3>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔤</div>
                                    <div class="font-weight-medium">Base64 Converter</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔢</div>
                                    <div class="font-weight-medium">Hex Converter</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">#️⃣</div>
                                    <div class="font-weight-medium">ASCII Table</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>