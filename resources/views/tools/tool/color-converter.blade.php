@section('site_title', formatTitle('Free Color Converter Tool | HEX, RGB, HSL & CMYK Converter | AllToolsFree.com'))
@section('site_description', formatTitle('Convert color codes instantly between HEX, RGB, HSL, CMYK formats with our free online color converter. Perfect for web designers, developers & digital artists. No registration required.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => route('dashboard'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Color converter') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Color converter') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.color_converter') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
            @cannot('tools', ['App\Models\User'])
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
            @endcannot

            @csrf

            <div class="form-group">
                <label for="i-color">{{ __('Color') }}</label>
                <input type="text" name="color" id="i-color" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" value="{{ $color ?? (old('color') ?? '') }}">
                @if ($errors->has('color'))
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first('color') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Convert') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.color_converter') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
                    @foreach($results as $key => $value)
                        <div class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 text-break d-flex align-items-center">
                                            <div class="d-flex align-items-center justify-content-center rounded width-4 height-4 flex-shrink-0 mr-2" style="background: {{ str_replace(',', ', ', $value) }};"></div>
                                            <code>{{ $key }}</code>
                                        </div>
                                        <div class="col-12 col-lg-8 text-break">
                                            <code>{{ str_replace(',', ', ', $value) }}</code>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="btn btn-sm btn-outline-primary" data-tooltip-copy="true" data-clipboard-copy="{{ $value }}" title="{{ __('Copy') }}" data-text-copy="{{ __('Copy') }}" data-text-copied="{{ __('Copied') }}">{{ __('Copy') }}</div>
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
        <h1 class="h3 mb-3">Color Converter Tool - Free Color Code Translator</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">🎨</div>
                <div>Instantly convert between HEX, RGB, HSL, CMYK and named colors with our free Color Converter tool. Perfect for designers, developers, and digital marketers.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Real-Time Conversion</span>
            <span class="badge badge-info mb-2">✅ No Installation</span>
        </div>

        <h2 class="h4 mb-3">Why Use Our Color Converter?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔄 Multi-Format Support</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Convert between 10+ color formats</li>
                            <li class="mb-1">HEX to RGB, HSL to CMYK, and more</li>
                            <li>Named color recognition</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🎯 Designer-Friendly</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Visual color picker</li>
                            <li>Color palette generator</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">💻 Developer Ready</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">CSS-ready code output</li>
                            <li>Copy/paste functionality</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🌈 Accessibility Tools</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Contrast ratio checker</li>
                            <li>WCAG compliance indicators</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Convert Colors</h2>
        
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
                        <td>Enter color value or use picker</td>
                        <td>System detects input format automatically</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Select target format</td>
                        <td>Instant conversion calculation</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Copy converted values</td>
                        <td>Ready for design or code implementation</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Supported Color Formats</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔵 HEX</h3>
                        <p>#RRGGBB format for web design</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🟢 RGB</h3>
                        <p>Red, Green, Blue values (0-255)</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🟣 HSL</h3>
                        <p>Hue, Saturation, Lightness</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🟡 CMYK</h3>
                        <p>Cyan, Magenta, Yellow, Key for print</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🟠 Named Colors</h3>
                        <p>"CornflowerBlue", "Tomato", etc.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚫ HSV</h3>
                        <p>Hue, Saturation, Value</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Pro Design Tip</h3>
            <p>Use our color converter to:</p>
            <ul class="mb-0">
                <li>Maintain brand consistency across media</li>
                <li>Ensure web colors match print materials</li>
                <li>Create accessible color schemes</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Who Uses Color Converter?</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🎨 Graphic Designers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Match digital and print colors</li>
                            <li>Create harmonious palettes</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💻 Web Developers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Convert designs to CSS</li>
                            <li>Implement brand colors</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📱 UI/UX Designers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Ensure accessibility</li>
                            <li>Maintain design systems</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">Color Conversion Examples</h2>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Format</th>
                        <th>Input</th>
                        <th>Output</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>HEX to RGB</strong></td>
                        <td>#4CAF50</td>
                        <td>rgb(76, 175, 80)</td>
                    </tr>
                    <tr>
                        <td><strong>RGB to HSL</strong></td>
                        <td>rgb(255, 165, 0)</td>
                        <td>hsl(39, 100%, 50%)</td>
                    </tr>
                    <tr>
                        <td><strong>Named to HEX</strong></td>
                        <td>GoldenRod</td>
                        <td>#DAA520</td>
                    </tr>
                    <tr>
                        <td><strong>CMYK to RGB</strong></td>
                        <td>cmyk(100%, 0%, 0%, 0%)</td>
                        <td>rgb(0, 255, 255)</td>
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
                            What's the difference between RGB and CMYK?
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        RGB is additive color for screens (Red, Green, Blue light), while CMYK is subtractive color for print (Cyan, Magenta, Yellow, Key/Black).
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            Is this color converter free?
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ Yes! AllToolsFree provides unlimited color conversions with no hidden costs.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            Why do colors look different on screen vs print?
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Screens emit light (RGB) while print reflects light (CMYK). Our converter helps bridge this gap by providing accurate translations between color models.
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h5 mb-3">Explore More Design Tools</h3>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🎨</div>
                                    <div class="font-weight-medium">Color Palette Generator</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🖌️</div>
                                    <div class="font-weight-medium">CSS Gradient Generator</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">👁️</div>
                                    <div class="font-weight-medium">Contrast Checker</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
