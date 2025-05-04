@section('site_title', formatTitle('Free Case Converter Tool | Change Text Case Online | AllToolsFree.com'))
@section('site_description', formatTitle('Instantly convert text between uppercase, lowercase, sentence case & more with our free online case converter. Perfect for writers, developers & SEO professionals. No registration required.'))


@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => route('dashboard'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Case converter') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Case converter') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.case_converter') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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
                        <input type="radio" id="i-type-sentence-case" name="type" class="custom-control-input{{ $errors->has('type') ? ' is-invalid' : '' }}" value="ucfirst" @if ((old('type') !== null && old('type') == 'ucfirst') || (isset($type) && $type == 'ucfirst' && old('type') == null)) checked @endif>
                        <label class="custom-control-label" for="i-type-sentence-case">{{ Str::ucfirst(__('Sentence case')) }}</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="i-type-lower-case" name="type" class="custom-control-input{{ $errors->has('type') ? ' is-invalid' : '' }}" value="lower" @if ((old('type') !== null && old('type') == 'lower') || (isset($type) && $type == 'lower' && old('type') == null)) checked @endif>
                        <label class="custom-control-label" for="i-type-lower-case">{{ Str::lower(__('Lower case')) }}</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="i-type-upper-case" name="type" class="custom-control-input{{ $errors->has('type') ? ' is-invalid' : '' }}" value="upper" @if ((old('type') !== null && old('type') == 'upper') || (isset($type) && $type == 'upper' && old('type') == null)) checked @endif>
                        <label class="custom-control-label" for="i-type-upper-case">{{ Str::upper(__('Upper case')) }}</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="i-type-capitalized-case" name="type" class="custom-control-input{{ $errors->has('type') ? ' is-invalid' : '' }}" value="title" @if ((old('type') !== null && old('type') == 'title') || (isset($type) && $type == 'title' && old('type') == null)) checked @endif>
                        <label class="custom-control-label" for="i-type-capitalized-case">{{ Str::title(__('Capitalized case')) }}</label>
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
                    <a href="{{ route('tools.case_converter') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
        <h1 class="h3 mb-3">Case Converter Tool - Transform Text Cases Instantly</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">🔠</div>
                <div>Convert text between uppercase, lowercase, title case, sentence case, and more with our free online tool. Perfect for writers, developers, and professionals.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Conversion</span>
            <span class="badge badge-info mb-2">✅ No Registration</span>
        </div>

        <h2 class="h4 mb-3">Why Use Our Case Converter?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">✍️ Writing</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Format headlines and titles</li>
                            <li class="mb-1">Standardize essay formatting</li>
                            <li>Prepare consistent social media posts</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">💻 Programming</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Convert variable names (camelCase to snake_case)</li>
                            <li>Format code comments</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📊 SEO</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Optimize meta titles and descriptions</li>
                            <li>Format URL slugs</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚡ Efficiency</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Convert large documents in seconds</li>
                            <li>No manual retyping needed</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Use Case Converter</h2>
        
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
                        <td>Text appears in input box</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Select case style</td>
                        <td>Preview updates instantly</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Click "Convert"</td>
                        <td>Formatted text ready to copy</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Supported Case Styles</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">UPPERCASE</h3>
                        <p>ALL LETTERS CAPITALIZED FOR EMPHASIS</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">lowercase</h3>
                        <p>all letters in small case</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">Title Case</h3>
                        <p>Capitalize Each Major Word</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">Sentence case</h3>
                        <p>Capitalize first word only</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">camelCase</h3>
                        <p>removeSpacesAndCapitalize</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">snake_case</h3>
                        <p>words_separated_by_underscores</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Pro Tip</h3>
            <p>For best results:</p>
            <ul class="mb-0">
                <li>Use Title Case for headings and article titles</li>
                <li>camelCase for programming variables</li>
                <li>Sentence case for paragraphs and normal text</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Who Uses This Tool?</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👩‍💻 Content Writers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Format blog post titles</li>
                            <li>Prepare consistent content</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍🎓 Students</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Format research papers</li>
                            <li>Prepare presentation slides</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💼 Professionals</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Format business documents</li>
                            <li>Prepare consistent emails</li>
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
                        <th>Original</th>
                        <th>UPPERCASE</th>
                        <th>Title Case</th>
                        <th>camelCase</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>hello world</td>
                        <td>HELLO WORLD</td>
                        <td>Hello World</td>
                        <td>helloWorld</td>
                    </tr>
                    <tr>
                        <td>the quick brown fox</td>
                        <td>THE QUICK BROWN FOX</td>
                        <td>The Quick Brown Fox</td>
                        <td>theQuickBrownFox</td>
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
                            What's the difference between Title Case and Sentence case?
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        <strong>Title Case</strong> capitalizes all major words (e.g., "The Quick Brown Fox"). <strong>Sentence case</strong> only capitalizes the first word (e.g., "The quick brown fox").
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            Can I convert code variables between cases?
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ Yes! Our tool is perfect for converting between programming cases like camelCase, PascalCase, and snake_case.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            Is there a character limit?
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        You can convert up to 10,000 characters at once. For longer texts, simply process in sections.
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h5 mb-3">Explore More Text Tools</h3>
                <div class="row">
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
                                    <div class="font-weight-medium">Lorem Ipsum Generator</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
