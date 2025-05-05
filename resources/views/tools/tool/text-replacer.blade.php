@section('site_title', formatTitle('Free Text Replacer Tool | Find & Replace Text Online | AllToolsFree.com'))
@section('site_description', formatTitle('Quickly find and replace text online with our free Text Replacer tool. Perfect for editing content, code, or bulk text changes. No downloads or registration needed.'))
@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Text replacer') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Text replacer') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.text_replacer') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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
                <label for="i-find">{{ __('Find') }}</label>
                <input type="text" name="find" id="i-find" class="form-control{{ $errors->has('find') ? ' is-invalid' : '' }}" value="{{ $find ?? (old('find') ?? '') }}">
                @if ($errors->has('find'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('find') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="i-replace">{{ __('Replace') }}</label>
                <input type="text" name="replace" id="i-replace" class="form-control{{ $errors->has('replace') ? ' is-invalid' : '' }}" value="{{ $replace ?? (old('replace') ?? '') }}">
                @if ($errors->has('replace'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('replace') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Replace') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.text_replacer') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
        <h1 class="h3 mb-3">🔁 Free Online Text Replacer Tool</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">✏️</div>
                <div>Instantly find and replace words or characters in your text. Perfect for editors, coders, SEO professionals, and students.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Replace</span>
            <span class="badge badge-info mb-2">✅ Secure & In-Browser</span>
        </div>

        <h2 class="h4 mb-3">Why Use the Text Replacer Tool?</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚡ Fast Text Replacement</h3>
                        <p>Replace hundreds of words or phrases instantly—even in large documents.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🎯 Accurate & Reliable</h3>
                        <p>Exact string match detection ensures consistent, error-free results across your content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🧠 Intelligent Replacement Logic</h3>
                        <p>Supports case-sensitive matching, multiline input, and formatting preservation.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mt-4 mb-3">Tool Features</h2>
        <ul class="list-unstyled">
            <li>✅ Easy input/output with find & replace boxes</li>
            <li>🔄 Supports multiple simultaneous replacements</li>
            <li>🔐 100% privacy — no data stored or shared</li>
            <li>📱 Fully responsive for desktop, tablet, and mobile</li>
        </ul>

        <h2 class="h4 mt-4 mb-3">Use Cases</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">✍️ Writers</h3>
                        <p>Replace character names or phrases across articles or stories.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">💻 Developers</h3>
                        <p>Update code snippets, class names, or markup across large files quickly.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">📈 SEO Experts</h3>
                        <p>Update keyword strategies by swapping outdated terms with improved ones.</p>
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
                        <td>Paste your original text</td>
                        <td>Input appears in the text box</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Enter the word/phrase to replace</td>
                        <td>Target term is recognized</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Input the replacement</td>
                        <td>New term is set</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Click “Replace Text”</td>
                        <td>Transformed output displayed instantly</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Pro Tips</h3>
            <ul class="mb-0">
                <li>Use case-sensitive mode for precise edits</li>
                <li>Break down large data into manageable chunks</li>
                <li>Use bulk mode for multiple replacements</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Why Choose AllToolsFree?</h2>
        <ul class="list-unstyled">
            <li>🔓 No sign-up or login required</li>
            <li>⚙️ Real-time browser-based processing</li>
            <li>♾️ Unlimited usage for all tools</li>
        </ul>

        <h2 class="h4 mt-4 mb-3">Part of the AllToolsFree Suite</h2>
        <div class="row">
            <div class="col-md-4 mb-2">
                <a href="#" class="text-dark d-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-2">🧹</div>
                            <div class="font-weight-medium">Text Cleaner</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="#" class="text-dark d-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-2">🔄</div>
                            <div class="font-weight-medium">Text Reverser</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="#" class="text-dark d-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-2">🔠</div>
                            <div class="font-weight-medium">Word Counter</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <p class="mt-4 small text-muted">
            Keywords: free text replacer, online text replacement tool, replace words in text, find and replace tool, string replacement tool, web text editing, instant content updater.
        </p>
    </div>
</div>
