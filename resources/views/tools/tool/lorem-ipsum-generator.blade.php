@section('site_title', formatTitle('Free Lorem Ipsum Generator | Dummy Text for Designers & Developers | AllToolsFree.com'))
@section('site_description', formatTitle('Generate placeholder text instantly with our free Lorem Ipsum generator. Perfect for web designers, developers & content creators. Customize length & format in seconds. No signup needed!'))


@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => route('dashboard'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Lorem ipsum generator') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Lorem ipsum generator') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.lorem_ipsum_generator') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
            @cannot('tools', ['App\Models\User'])
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
            @endcannot

            @csrf

            <div class="form-group">
                <label for="i-type">{{ __('Type') }}</label>
                <select name="type" id="i-type" class="custom-select{{ $errors->has('type') ? ' is-invalid' : '' }}">
                    @foreach(['paragraphs' => __('Paragraphs'), 'sentences' => __('Sentences'), 'words' => __('Words')] as $key => $value)
                        <option value="{{ $key }}" @if ((old('type') !== null && old('type') == $key) || (isset($type) && $type == $key && old('type') == null)) selected @endif>{{ $value }}</option>
                    @endforeach
                </select>
                @if ($errors->has('type'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('type') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="i-number">{{ __('Number') }}</label>
                <input type="number" name="number" id="i-number" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" value="{{ $number ?? (old('number') ?? '5') }}">
                @if ($errors->has('number'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('number') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Generate') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.lorem_ipsum_generator') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
        <div class="card-body mb-n3">
            <div class="form-group">
                <label for="i-result-content">{{ __('Content') }}</label>

                <div class="position-relative">
                        <textarea rows="5" id="i-result-content" class="form-control" onclick="this.select();" readonly>
@foreach($results as $block)
{{ $block }}
@if(!$loop->last)@endif
@endforeach</textarea>

                    <div class="position-absolute top-0 right-0">wf
                        <div class="btn btn-sm btn-primary m-2" data-tooltip-copy="true" title="{{ __('Copy') }}" data-text-copy="{{ __('Copy') }}" data-text-copied="{{ __('Copied') }}" data-clipboard="true" data-clipboard-target="#i-result-content">{{ __('Copy') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="card border-0 shadow-sm mt-4 p-3">
    <div class="card-body">
        <h1 class="h3 mb-3">Generate Dummy Text Instantly with the Lorem Ipsum Generator – Free Tool by AllToolsFree</h1>

        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">📄</div>
                <div>Create placeholder content for wireframes, designs, and prototypes in seconds. Ideal for designers, developers, and strategists.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ Free Forever</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Generation</span>
            <span class="badge badge-info mb-2">✅ No Sign-Up</span>
        </div>

        <h2 class="h4 mb-3">What is Lorem Ipsum?</h2>
        <p>Lorem Ipsum is dummy text used in design and typesetting since the 1500s. It mimics natural language flow without being meaningful, helping keep focus on layout.</p>

        <h2 class="h4 mb-3 mt-4">Tool Benefits</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚡ Fast & Flexible</h3>
                        <ul class="list-unstyled mb-0">
                            <li>Generate paragraphs, sentences, or words</li>
                            <li>Switch between classic or custom styles</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🖥️ Browser-Based</h3>
                        <ul class="list-unstyled mb-0">
                            <li>Zero installation or registration</li>
                            <li>Works on desktop and mobile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Use the Generator</h2>
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
                        <td>Select paragraph/word count</td>
                        <td>Sets the generation criteria</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Click “Generate”</td>
                        <td>Dummy text appears instantly</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Copy & paste</td>
                        <td>Use it in your layout or code</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Use Cases</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🎨 Design Mockups</h3>
                        <p>Preview layout flow and balance using realistic-looking text blocks.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🧪 Testing</h3>
                        <p>Perform QA, stress tests, and UX trials with accurate content simulation.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">💻 Developer Prototyping</h3>
                        <p>Fill HTML, CSS, or WordPress blocks with text quickly.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">Tool Features</h2>
        <ul class="list-unstyled">
            <li>🔹 Paragraph, sentence & word generation</li>
            <li>🔹 Mobile-friendly & clutter-free interface</li>
            <li>🔹 No watermarks or user tracking</li>
            <li>🔹 SEO prototype support for content layout</li>
        </ul>

        <h2 class="h4 mb-3 mt-4">FAQs – Lorem Ipsum Generator</h2>
        <div class="accordion mb-4" id="faqLoremIpsum">
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="faqOne">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#faqCollapseOne">
                            Is this Lorem Ipsum Generator really free?
                        </button>
                    </h3>
                </div>
                <div id="faqCollapseOne" class="collapse show" data-parent="#faqLoremIpsum">
                    <div class="card-body">Yes, completely free with no usage limits.</div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="faqTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#faqCollapseTwo">
                            Can I use it in commercial designs?
                        </button>
                    </h3>
                </div>
                <div id="faqCollapseTwo" class="collapse" data-parent="#faqLoremIpsum">
                    <div class="card-body">Yes, Lorem Ipsum has no copyright and is safe for commercial use.</div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="faqThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#faqCollapseThree">
                            Will it support other dummy text styles?
                        </button>
                    </h3>
                </div>
                <div id="faqCollapseThree" class="collapse" data-parent="#faqLoremIpsum">
                    <div class="card-body">Yes, future versions will include multiple text styles beyond classic Lorem Ipsum.</div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Pro Tip</h3>
            <p>Use Lorem Ipsum to:</p>
            <ul class="mb-0">
                <li>Visualize how real content will fit your layout</li>
                <li>Test SEO-ready structures with mock data</li>
                <li>Prepare responsive and print-friendly designs</li>
            </ul>
        </div>

        <h2 class="h4 mt-4 mb-3">Explore More Tools on AllToolsFree</h2>
        <p>Find productivity tools across categories: development, content, SEO, testing, and more — all in one place at <strong>AllToolsFree.com</strong>.</p>
    </div>
</div>
