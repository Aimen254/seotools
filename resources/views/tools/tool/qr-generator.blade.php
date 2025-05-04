@section('site_title', formatTitle('Free QR Code Generator | Create Custom QR Codes Online | AllToolsFree.com'))
@section('site_description', formatTitle('Generate free, customizable QR codes instantly. No registration needed. Perfect for businesses, marketers, and developers. Track scans, change colors, and download high-quality QR images.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => route('dashboard'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 content-break">{{ __('QR generator') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('QR generator') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.qr_generator') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
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
                <label for="i-size">{{ __('Size') }}</label>
                <input type="number" name="size" id="i-size" class="form-control{{ $errors->has('size') ? ' is-invalid' : '' }}" value="{{ $size ?? (old('size') ?? '200') }}">
                @if ($errors->has('size'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('size') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Generate') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.qr_generator') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
                <label>{{ __('QR code') }}</label>

                <div id="qr-code">
                    {!! QrCode::encoding('UTF-8')->size($size)->margin(0)->generate($result); !!}
                </div>

                <button type="button" class="btn btn-primary mt-3" id="qr-download">{{ __('Download') }}</button>

                <canvas id="qr-canvas" width="{{ $size }}" height="{{ $size }}" class="d-none"></canvas>
            </div>
        </div>
    </div>
@endif
<div class="card border-0 shadow-sm mt-4 p-3">
    <div class="card-body">
        <h1 class="h3 mb-3">QR Code Generator - Create Custom QR Codes Instantly</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">📱</div>
                <div>Generate free QR codes for URLs, contact info, WiFi credentials, and more. Our tool creates high-quality, customizable QR codes that work on all smartphones and scanning devices.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Generation</span>
            <span class="badge badge-info mb-2">✅ No Watermarks</span>
        </div>

        <h2 class="h4 mb-3">Why Use Our QR Code Generator?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🚀 Instant Sharing</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Share website links instantly</li>
                            <li class="mb-1">Distribute contact information</li>
                            <li>Promote products/services easily</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🎨 Fully Customizable</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Custom colors and designs</li>
                            <li>Add your logo/branding</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📊 Multiple Formats</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Download as PNG, SVG, EPS</li>
                            <li>Print-ready high resolution</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔒 Dynamic Tracking</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Track scan statistics</li>
                            <li>Edit content without changing QR</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Create QR Codes</h2>
        
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
                        <td>Select QR type (URL, text, WiFi, etc.)</td>
                        <td>Choose from 10+ content formats</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Enter your content/link</td>
                        <td>System generates preview</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Customize design (optional)</td>
                        <td>Download or share your QR</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Key Features</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🖼️ Multiple Content Types</h3>
                        <p>Generate QR codes for URLs, text, emails, phone numbers, WiFi, and more</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🎨 Design Customization</h3>
                        <p>Change colors, add logos, and adjust frame styles</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📤 Unlimited Downloads</h3>
                        <p>Download as many QR codes as you need with no restrictions</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Marketing Pro Tip</h3>
            <p>For maximum engagement:</p>
            <ul class="mb-0">
                <li>Place QR codes on business cards and flyers</li>
                <li>Use in email signatures for quick contact</li>
                <li>Add to product packaging for instant support</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Who Uses QR Codes?</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👔 Business Owners</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Share menu/special offers</li>
                            <li>Link to loyalty programs</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👩‍🏫 Educators</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Share learning resources</li>
                            <li>Quick access to assignments</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💻 Developers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">App download links</li>
                            <li>WiFi network sharing</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">QR Code Use Cases</h2>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Application</th>
                        <th>Example</th>
                        <th>Scan Benefit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Business Cards</strong></td>
                        <td>vCard QR</td>
                        <td>Instant contact saving</td>
                    </tr>
                    <tr>
                        <td><strong>Restaurant Menus</strong></td>
                        <td>PDF Menu Link</td>
                        <td>Always up-to-date</td>
                    </tr>
                    <tr>
                        <td><strong>Product Packaging</strong></td>
                        <td>Instruction Videos</td>
                        <td>Enhanced customer support</td>
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
                            Are generated QR codes permanent?
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Yes! All QR codes generated remain active permanently. For dynamic QR codes, you can edit the destination URL without changing the QR image.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            Can I add my logo to the QR code?
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ Yes! Our advanced QR generator lets you upload logos and customize colors while maintaining scan reliability.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            What's the maximum data capacity?
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Standard QR codes hold up to 3KB of data (about 4,000 characters). For larger data needs, we support high-capacity QR variants.
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h5 mb-3">Explore More Marketing Tools</h3>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">📊</div>
                                    <div class="font-weight-medium">UTM Builder</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔗</div>
                                    <div class="font-weight-medium">URL Shortener</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">📝</div>
                                    <div class="font-weight-medium">Meta Tags Generator</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    'use strict';

    let initiateDownload = (imgURI) => {
        var evt = new MouseEvent('click', {
            view: window,
            bubbles: false,
            cancelable: true
        });

        let a = document.createElement('a');
        a.setAttribute('download', 'qr.png');
        a.setAttribute('href', imgURI);
        a.setAttribute('target', '_blank');

        a.dispatchEvent(evt);
    }

    document.querySelector('#qr-download').addEventListener('click', function () {
        let canvas = document.querySelector('#qr-canvas');
        let ctx = canvas.getContext('2d');
        let data = (new XMLSerializer()).serializeToString(document.querySelector('#qr-code > svg'));
        let DOMURL = window.URL || window.webkitURL || window;

        let img = new Image();
        let svgBlob = new Blob([data], {type: 'image/svg+xml;charset=utf-8'});
        let url = DOMURL.createObjectURL(svgBlob);

        img.onload = function () {
            ctx.drawImage(img, 0, 0);
            DOMURL.revokeObjectURL(url);

            var imgURI = canvas.toDataURL('image/png').replace('image/png', 'image/octet-stream');

            initiateDownload(imgURI);
        };

        img.src = url;
    });
</script>
