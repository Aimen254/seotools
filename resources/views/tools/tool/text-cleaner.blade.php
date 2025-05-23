@section('site_title', formatTitle('Free Text Cleaner Tool | Remove Extra Spaces & Format Text | AllToolsFree.com'))
@section('site_description', formatTitle('Clean and format messy text instantly with our free online text cleaner. Remove extra spaces, line breaks, and unwanted formatting to perfect your content. No registration required.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Text cleaner') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Text cleaner') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.text_cleaner') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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
                <label for="i-html-tags">{{ __('HTML tags') }}</label>
                <select name="html_tags" id="i-html-tags" class="custom-select{{ $errors->has('html_tags') ? ' is-invalid' : '' }}">
                    @foreach([1 => __('All'), 0 => __('None')] as $key => $value)
                        <option value="{{ $key }}" @if ((old('html_tags') !== null && old('html_tags') == $key) || (isset($htmlTags) && $htmlTags == $key && old('html_tags') == null)) selected @endif>{{ $value }}</option>
                    @endforeach
                </select>
                @if ($errors->has('html_tags'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('html_tags') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="i-spaces">{{ __('Spaces') }}</label>
                <select name="spaces" id="i-spaces" class="custom-select{{ $errors->has('spaces') ? ' is-invalid' : '' }}">
                    @foreach([2 => __('Duplicated'), 1 => __('All'), 0 => __('None')] as $key => $value)
                        <option value="{{ $key }}" @if ((old('spaces') !== null && old('spaces') == $key) || (isset($spaces) && $spaces == $key && old('spaces') == null)) selected @endif>{{ $value }}</option>
                    @endforeach
                </select>
                @if ($errors->has('spaces'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('spaces') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="i-line-breaks">{{ __('Line breaks') }}</label>
                <select name="line_breaks" id="i-line-breaks" class="custom-select{{ $errors->has('line_breaks') ? ' is-invalid' : '' }}">
                    @foreach([2 => __('Duplicated'), 1 => __('All'), 0 => __('None')] as $key => $value)
                        <option value="{{ $key }}" @if ((old('line_breaks') !== null && old('line_breaks') == $key) || (isset($lineBreaks) && $lineBreaks == $key && old('line_breaks') == null)) selected @endif>{{ $value }}</option>
                    @endforeach
                </select>
                @if ($errors->has('line_breaks'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('line_breaks') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Remove') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.text_cleaner') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
        <h1 class="h3 mb-3">Text Cleaner Tool – Instantly Clean, Format & Optimize Your Text</h1>

        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">🧹</div>
                <div>Quickly remove HTML tags, extra spaces, line breaks, and more from your content with our powerful, free Text Cleaner Tool.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ Free & Fast</span>
            <span class="badge badge-primary mr-2 mb-2">✅ No Signup Required</span>
            <span class="badge badge-info mb-2">✅ Works Instantly</span>
        </div>

        <h2 class="h4 mb-3">Benefits of Using AllToolsFree’s Text Cleaner</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🧼 Remove Unwanted Elements</h3>
                        <ul class="list-unstyled mb-0">
                            <li>Extra spaces & line breaks</li>
                            <li>Special characters</li>
                            <li>HTML tags</li>
                            <li>Non-ASCII characters</li>
                            <li>Repeated punctuation</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📄 Improve Readability</h3>
                        <ul class="list-unstyled mb-0">
                            <li>Consistent spacing and paragraph breaks</li>
                            <li>Better formatting for web or print</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔍 SEO-Friendly Text</h3>
                        <ul class="list-unstyled mb-0">
                            <li>Removes invisible formatting</li>
                            <li>Improves crawlability</li>
                            <li>Reduces page load size</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📱 Cross-Platform</h3>
                        <ul class="list-unstyled mb-0">
                            <li>Works on mobile, tablet, desktop</li>
                            <li>Fully responsive design</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Use the Text Cleaner Tool</h2>
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
                        <td>Paste your messy text</td>
                        <td>Input is ready for cleaning</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Click “Clean Text”</td>
                        <td>Text is instantly cleaned</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Copy or download result</td>
                        <td>Use cleaned text as needed</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Who Can Use the Text Cleaner?</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">✏️ Writers & Bloggers</h3>
                        <ul class="list-unstyled mb-0">
                            <li>Clean content copied from Word/PDF</li>
                            <li>Get professional formatting</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🎓 Students & Educators</h3>
                        <ul class="list-unstyled mb-0">
                            <li>Ensure well-formatted assignments</li>
                            <li>Remove accidental artifacts</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">💼 Developers & Webmasters</h3>
                        <ul class="list-unstyled mb-0">
                            <li>Strip HTML/code artifacts</li>
                            <li>Prepare clean content for CMS</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">More Features at a Glance</h2>
        <ul class="mb-4">
            <li>Real-time cleaning with one click</li>
            <li>Custom checkboxes for cleaning options</li>
            <li>No installation or signup required</li>
            <li>Privacy-focused – data never stored</li>
        </ul>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Pro Tip</h3>
            <p>Use the Text Cleaner Tool before publishing to avoid invisible errors, broken tags, or formatting bugs that affect SEO and readability.</p>
        </div>

        <h2 class="h4 mb-3 mt-4">Explore More Tools on AllToolsFree</h2>
        <div class="row">
            <div class="col-md-4 mb-2">
                <a href="#" class="text-dark d-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-2">📄</div>
                            <div class="font-weight-medium">Word Counter</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="#" class="text-dark d-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-2">🖍️</div>
                            <div class="font-weight-medium">Case Converter</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="#" class="text-dark d-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-2">🧬</div>
                            <div class="font-weight-medium">Slug Generator</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <p class="mt-4">Try the Text Cleaner Tool Now — <strong>100% Free</strong> and accessible at <a href="https://alltolsfree.com/text-cleaner" target="_blank">alltolsfree.com/text-cleaner</a></p>
    </div>
</div>
