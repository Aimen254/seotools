@section('site_title', formatTitle('Free Text Reverser Tool | Reverse Text Online | AllToolsFree.com'))  
@section('site_description', formatTitle('Quickly reverse any text online for free with our Text Reverser tool. Perfect for coding, puzzles, or fun social media posts. No signup required – try it now!'))  

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => route('dashboard'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Text reverser') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Text reverser') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.text_reverser') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Reverse') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.text_reverser') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
        <h1 class="h3 mb-3">🔁 Free Online Text Reverser Tool</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">✏️</div>
                <div>Instantly flip your text backward for coding, creativity, or fun. Perfect for developers, content creators, and educators.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Reverse</span>
            <span class="badge badge-info mb-2">✅ Secure & Private</span>
        </div>

        <h2 class="h4 mb-3">Why Use the Text Reverser Tool?</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚡ Lightning Fast</h3>
                        <p>Reverse 10,000+ characters in under a second—no lag, no limits.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🎯 Accurate Reversal</h3>
                        <p>Preserves all characters, including emojis (👍 → 👎) and Unicode symbols.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🌐 Multi-Language Support</h3>
                        <p>Works with English, Arabic, Spanish, and all UTF-8 languages.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mt-4 mb-3">Tool Features</h2>
        <ul class="list-unstyled">
            <li>✅ One-click text reversal</li>
            <li>🔄 Preserves original formatting</li>
            <li>🔐 100% in-browser processing (no data stored)</li>
            <li>📱 Optimized for mobile & desktop</li>
        </ul>

        <h2 class="h4 mt-4 mb-3">Use Cases</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">👩💻 Developers</h3>
                        <p>Test string manipulation functions or debug encoded data.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">✍️ Content Creators</h3>
                        <p>Create viral social media posts (e.g., "ɘlqoɘʞɒb ɘʜT").</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">🎓 Educators</h3>
                        <p>Teach palindrome concepts or cryptography basics.</p>
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
                        <td>Paste your text</td>
                        <td>Input appears in the text box</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Click "Reverse Text"</td>
                        <td>Text flips instantly</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Copy/download result</td>
                        <td>Reversed text ready to use</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Pro Tips</h3>
            <ul class="mb-0">
                <li>Use for creating secret messages or puzzles</li>
                <li>Combine with <a href="#" class="text-white font-weight-bold">Case Converter</a> for more effects</li>
                <li>Check palindromes by reversing and comparing</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Why Choose AllToolsFree?</h2>
        <ul class="list-unstyled">
            <li>🔓 No registration required</li>
            <li>⚙️ Works offline after initial load</li>
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
            Keywords: reverse text online, flip text generator, backward text tool, string reverser, Unicode reverser, text flipper, palindrome checker tool.
        </p>
    </div>
</div>