@section('site_title', formatTitle('Free Word Density Counter Tool | Analyze Keyword Density | AllToolsFree.com'))
@section('site_description', formatTitle('Check word density and keyword frequency in your text with our free online tool. Perfect for SEO optimization, content analysis, and improving search rankings. No registration required.'))
@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => route('dashboard'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Word density counter') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Word density counter') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.word_density_counter') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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
                    <a href="{{ route('tools.word_density_counter') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
                        <div class="row">
                            <div class="col-12 col-lg-6 text-truncate">
                                {{ __('Keyword') }}
                            </div>

                            <div class="col-12 col-lg-3 text-truncate">
                                {{ __('Number') }}
                            </div>

                            <div class="col-12 col-lg-3 text-truncate">
                                {{ __('Density') }}
                            </div>
                        </div>
                    </div>

                    @foreach($results as $keyword => $count)
                        <div class="list-group-item px-0">
                            <div class="row">
                                <div class="col-12 col-lg-6 text-truncate">
                                    {{ $keyword }}
                                </div>

                                <div class="col-12 col-lg-3 text-truncate">
                                    {{ $count }}
                                </div>

                                <div class="col-12 col-lg-3 text-truncate">
                                    {{ number_format((($count / $total) * 100), 2, __('.'), __(',')) }}%
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
        <h1 class="h3 mb-3">📊 Free Online Word Density Counter Tool</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">🔍</div>
                <div>Instantly analyze keyword frequency and optimize your content for better SEO. Perfect for writers, SEO specialists, and content creators.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Real-time Analysis</span>
            <span class="badge badge-info mb-2">✅ Secure & Private</span>
        </div>

        <h2 class="h4 mb-3">Why Use Our Word Density Counter?</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚡ SEO Optimization</h3>
                        <p>Identify overused or underused keywords to fine-tune content for search engines.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🎯 Content Balance</h3>
                        <p>Avoid keyword stuffing while ensuring key terms appear naturally.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📚 Academic Integrity</h3>
                        <p>Students can analyze word usage in essays and reports for clarity.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🚀 Fast Results</h3>
                        <p>Get analysis in seconds—no signup or payment required.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mt-4 mb-3">Tool Features</h2>
        <ul class="list-unstyled">
            <li>✅ Real-time keyword frequency analysis</li>
            <li>📈 Phrase density checker (2-3 word combinations)</li>
            <li>🔍 Stop word filtering (ignore "and", "the", etc.)</li>
            <li>🌐 Multi-language support (English, Spanish, French etc.)</li>
            <li>☁️ Cloud integration (Google Drive/Dropbox)</li>
        </ul>

        <h2 class="h4 mt-4 mb-3">Who Benefits from This Tool?</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">✍️ Content Writers</h3>
                        <p>Ensure keyword distribution aligns with SEO best practices.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">🔍 SEO Specialists</h3>
                        <p>Optimize on-page content for higher search rankings.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6">🎓 Students</h3>
                        <p>Analyze word usage in academic papers for better clarity.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mt-4 mb-3">How to Check Word Density</h2>
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
                        <td>Paste text or upload file</td>
                        <td><code>Your content ready for analysis</code></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Click "Check Density"</td>
                        <td>Instant keyword scanning begins</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>View detailed report</td>
                        <td>Keywords highlighted with percentages</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Pro SEO Tips</h3>
            <ul class="mb-0">
                <li>Ideal keyword density: 1-2% of total words</li>
                <li>Focus on 2-3 word phrase combinations for best SEO results</li>
                <li>Use our tool with the SEO Analyzer for complete optimization</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Advanced Analysis Types</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔍 Single-Word Density</h3>
                        <p>Tracks frequency of individual keywords in your content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📊 Phrase Density</h3>
                        <p>Analyzes 2-3 word combinations like "best SEO tools".</p>
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
            <li>💯 100% accurate results</li>
        </ul>

        <h2 class="h4 mt-4 mb-3">Frequently Asked Questions</h2>
        <div class="accordion mb-4" id="faqAccordion">
            <div class="card mb-2">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne">
                            Is this Word Density Counter free?
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Yes! Our basic version is 100% free with no hidden costs.
                    </div>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            How accurate is the analysis?
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        Highly accurate—calculates exact keyword occurrences and percentages.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            Does this tool store my content?
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        No, your content is processed securely and never saved on our servers.
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mt-4 mb-3">Part of the AllToolsFree Content Suite</h2>
        <div class="row">
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
            <div class="col-md-4 mb-2">
                <a href="#" class="text-dark d-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-2">🔄</div>
                            <div class="font-weight-medium">Case Converter</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <p class="mt-4 small text-muted">
            Keywords: word density counter, keyword frequency analyzer, free SEO tools, content optimization tool, keyword density checker, phrase analyzer, word frequency counter.
        </p>
    </div>
</div>