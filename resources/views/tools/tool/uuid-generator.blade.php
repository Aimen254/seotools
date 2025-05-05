@section('site_title', formatTitle('Free UUID Generator Tool | Create Unique Identifiers Online | AllToolsFree.com'))
@section('site_description', formatTitle('Generate RFC-compliant UUIDs instantly with our free online tool. Create version 1 or version 4 universally unique identifiers for development, databases & applications. No registration required.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('UUID generator') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('UUID generator') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.uuid_generator') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
            @cannot('tools', ['App\Models\User'])
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
            @endcannot

            @csrf

            <div class="form-group">
                <label for="i-uuid-generator" class="d-inline-flex align-items-center"><span class="{{ (__('lang_dir') == 'rtl' ? 'ml-2' : 'mr-2') }}">{{ __('UUID') }}</span><span class="badge badge-secondary">{{ __('v4') }}</span></label>
                <div class="input-group">
                    <input type="text" name="uuid_generator" id="i-uuid-generator" class="form-control" value="{{ Str::uuid() }}">
                    <div class="input-group-append">
                        <div class="btn btn-primary" data-tooltip-copy="true" title="{{ __('Copy') }}" data-text-copy="{{ __('Copy') }}" data-text-copied="{{ __('Copied') }}" data-clipboard="true" data-clipboard-target="#i-uuid-generator">{{ __('Copy') }}</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Regenerate') }}</button>
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
<div class="card border-0 shadow-sm mt-4 p-3">
    <div class="card-body">
        <h1 class="h3 mb-3">UUID Generator Tool - Create Universally Unique Identifiers Instantly</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">🔑</div>
                <div>Generate cryptographically secure UUIDs (v1, v4) for your applications, databases, and systems with our free online tool. Perfect for developers, testers, and system architects.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Generation</span>
            <span class="badge badge-info mb-2">✅ No Registration</span>
        </div>

        <h2 class="h4 mb-3">Why Use Our UUID Generator?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">💻 Development</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Create unique IDs for database records</li>
                            <li class="mb-1">Generate test data for applications</li>
                            <li>Implement distributed systems safely</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔒 Security</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Prevent ID collision risks</li>
                            <li>Generate unguessable identifiers</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚡ Efficiency</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Save hours of manual coding</li>
                            <li>Bulk generate multiple UUIDs</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📊 Compatibility</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Works across all programming languages</li>
                            <li>Supports multiple UUID versions</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Generate UUIDs</h2>
        
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
                        <td>Select UUID version (v1 or v4)</td>
                        <td>System prepares appropriate algorithm</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Choose quantity (1-1000)</td>
                        <td>Ready for batch generation</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Click "Generate UUID"</td>
                        <td>Instant unique identifiers created</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Key Features</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔄 Multiple Versions</h3>
                        <p>Generate both time-based (v1) and random (v4) UUIDs according to RFC 4122 standards</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📋 Bulk Generation</h3>
                        <p>Create up to 1,000 UUIDs at once for testing or database seeding</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📥 Export Options</h3>
                        <p>Copy to clipboard or download as TXT/CSV for easy integration</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Developer Pro Tip</h3>
            <p>For optimal UUID usage:</p>
            <ul class="mb-0">
                <li>Use v4 for most web applications</li>
                <li>Choose v1 when you need time-orderable IDs</li>
                <li>Combine with our API for automated generation</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Who Uses This Tool?</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💻 Backend Developers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Create primary keys for databases</li>
                            <li>Implement distributed systems</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🧪 QA Engineers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Generate test data</li>
                            <li>Stress test ID collision handling</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📊 Data Architects</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Design scalable database schemas</li>
                            <li>Plan unique identifier strategies</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">UUID Versions Explained</h2>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Version</th>
                        <th>Example</th>
                        <th>Best For</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>v1</strong></td>
                        <td>f47ac10b-58cc-11e0-80e3-0800200c9a66</td>
                        <td>Time-ordered sequences, historical records</td>
                    </tr>
                    <tr>
                        <td><strong>v4</strong></td>
                        <td>550e8400-e29b-41d4-a716-446655440000</td>
                        <td>Most web applications, random IDs</td>
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
                            What's the difference between UUID v1 and v4?
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        UUID v1 combines MAC address and timestamp for uniqueness, while v4 uses pure random numbers. v1 is predictable but time-ordered; v4 is completely random but has a tiny collision probability (1 in 2<sup>122</sup>).
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            Are generated UUIDs truly unique?
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ While no system can guarantee absolute uniqueness, properly generated UUIDs have such a low collision probability (especially v4) that they're considered universally unique for practical purposes.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            Can I use these UUIDs in production?
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Absolutely! Our tool generates standard-compliant UUIDs identical to those created by programming libraries. They're cryptographically secure and ready for production use.
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h5 mb-3">Explore More Developer Tools</h3>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔑</div>
                                    <div class="font-weight-medium">Password Generator</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔢</div>
                                    <div class="font-weight-medium">MD5 Generator</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">📄</div>
                                    <div class="font-weight-medium">JSON Validator</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>