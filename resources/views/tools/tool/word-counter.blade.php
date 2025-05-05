@section('site_title', formatTitle('Free Word Counter Tool | Accurate Character & Word Count | AllToolsFree.com'))
@section('site_description', formatTitle('Count words, characters, sentences & paragraphs instantly with our free online word counter. Perfect for writers, students & SEO professionals. No registration required.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Word counter') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Word counter') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.word_counter') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Count') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.word_counter') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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

@if(isset($content))
    <div class="card border-0 shadow-sm mt-3">
        <div class="card-header align-items-center">
            <div class="row">
                <div class="col">
                    <div class="font-weight-medium py-1">{{ __('Results') }}</div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="list-group list-group-flush my-n3">
                <div class="list-group-item px-0">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-4 text-truncate text-muted">{{ __('Words') }}</div>
                        <div class="col-12 col-lg-8 text-truncate">{{ number_format($wordCount, 0, __('.'), __(',')) }}</div>
                    </div>
                </div>

                <div class="list-group-item px-0">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-4 text-truncate text-muted">{{ __('Letters') }}</div>
                        <div class="col-12 col-lg-8 text-truncate">{{ number_format($letterCount, 0, __('.'), __(',')) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="card border-0 shadow-sm mt-4 p-3">
    <div class="card-body">
        <h1 class="h3 mb-3">📝 Free Online Word Counter Tool</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">✏️</div>
                <div>Instantly count words, characters, sentences, and analyze reading time. Perfect for writers, students, and SEO professionals.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Real-time Results</span>
            <span class="badge badge-info mb-2">✅ Secure & Private</span>
        </div>

        <h2 class="h4 mb-3">Why Use the Word Counter Tool?</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚡ Instant Analysis</h3>
                        <p>Get word count, character count (with/without spaces), and reading time as you type.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🎯 SEO Optimization</h3>
                        <p>Track keyword density to optimize content for search engines without overstuffing.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📚 Academic Compliance</h3>
                        <p>Meet strict word limits for essays, research papers, and thesis documents.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mt-4 mb-3">Tool Features</h2>
        <ul class="list-unstyled">
            <li>✅ Real-time word and character counting</li>
            <li>📈 Sentence and paragraph analysis</li>
            <li>⏱️ Reading time estimation</li>
            <li>🔍 Keyword density checker</li>
            <li>📂 Supports TXT, DOCX, PDF uploads</li>
        </ul>

        <h2 class="h4 mt-4 mb-3">Use Cases</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">✍️ Writers & Bloggers</h3>
                        <p>Stay within editorial guidelines and improve content structure.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">🎓 Students</h3>
                        <p>Meet essay word limits and academic requirements precisely.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">📊 SEO Specialists</h3>
                        <p>Optimize meta descriptions and content length for search engines.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mt-4 mb-3">How to Count Words</h2>
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
                        <td>Paste text or upload file</td>
                        <td><code>The quick brown fox jumps...</code></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Click "Count Words"</td>
                        <td>Instant analysis begins</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>View detailed results</td>
                        <td>Words: 5 | Chars: 20 | Sentences: 1</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Pro Tips</h3>
            <ul class="mb-0">
                <li>Ideal length for meta descriptions: 150-160 characters</li>
                <li>Optimal blog post length: 1,500-2,500 words for SEO</li>
                <li>Twitter posts should stay under 280 characters</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Advanced Functionality</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔍 Keyword Density</h3>
                        <p>Track how often keywords appear to optimize SEO content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⏱️ Reading Time</h3>
                        <p>Estimate how long readers will spend on your content.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mt-4 mb-3">Why Choose AllToolsFree?</h2>
        <ul class="list-unstyled">
            <li>🔓 No registration required</li>
            <li>📱 Mobile-friendly interface</li>
            <li>🔒 Your text is never stored</li>
            <li>🌐 Supports multiple languages</li>
        </ul>

        <h2 class="h4 mt-4 mb-3">Frequently Asked Questions</h2>
        <div class="accordion mb-4" id="faqAccordion">
            <div class="card mb-2">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne">
                            Is this Word Counter really free?
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Yes! Our word counter is completely free with no hidden charges or limitations.
                    </div>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            What file formats can I upload?
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        We support TXT, DOCX, and PDF files. You can also paste text directly.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            Does this tool save my text?
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        No, your content is processed in real-time and never stored on our servers.
                    </div>
                </div>
            </div>
        </div>

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
                            <div class="mb-2">📊</div>
                            <div class="font-weight-medium">Word Density Counter</div>
                        </div>
                    </div>
                </a>
            </div>
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
        </div>

        <p class="mt-4 small text-muted">
            Keywords: word counter, character count, free word checker, reading time calculator, keyword density tool, online word analyzer, text length checker.
        </p>
    </div>
</div>