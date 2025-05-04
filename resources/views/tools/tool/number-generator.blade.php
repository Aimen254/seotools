@section('site_title', formatTitle('Free Number Generator Tool | Random & Custom Sequences | AllToolsFree.com'))
@section('site_description', formatTitle('Generate random numbers, custom sequences, or specific ranges instantly with our free online number generator. Perfect for statistics, coding, games, and more. No registration required.'))

@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => route('dashboard'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Number generator') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Number generator') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.number_generator') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
            @cannot('tools', ['App\Models\User'])
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
            @endcannot

            @csrf

            <div class="form-group">
                <label for="i-min">{{ __('Min') }}</label>
                <input type="number" name="min" id="i-min" class="form-control{{ $errors->has('min') ? ' is-invalid' : '' }}" value="{{ $min ?? (old('min') ?? '1') }}">
                @if ($errors->has('min'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('min') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="i-max">{{ __('Max') }}</label>
                <input type="text" name="max" id="i-max" class="form-control{{ $errors->has('max') ? ' is-invalid' : '' }}" value="{{ $max ?? (old('max') ?? '100') }}">
                @if ($errors->has('max'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('max') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Generate') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.number_generator') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
        <h1 class="h3 mb-3">Number Generator Tool – Create Random or Custom Numbers Instantly</h1>

        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">🔢</div>
                <div>Generate random, unique, or patterned numbers for your tasks with our fast and fully customizable online number generator.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ Free & Fast</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Real-Time Results</span>
            <span class="badge badge-info mb-2">✅ No Signup Required</span>
        </div>

        <h2 class="h4 mb-3">Key Benefits of Our Number Generator</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🎯 Fully Customizable</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Define min/max range</li>
                            <li class="mb-1">Choose quantity, uniqueness</li>
                            <li>Enable decimals and custom formats</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔁 Multiple Modes</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Random Number Generator</li>
                            <li class="mb-1">Sequential Generator</li>
                            <li>Unique & Custom Pattern Modes</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🛡️ Privacy First</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">All logic runs in-browser</li>
                            <li>No data is stored or shared</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📲 Mobile-Friendly</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Responsive layout</li>
                            <li>Works on any device</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Use the Number Generator</h2>
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
                        <td>Enter min and max values</td>
                        <td>Sets the numeric range</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Choose quantity and options</td>
                        <td>Customize uniqueness, format</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Click "Generate"</td>
                        <td>Instant result is displayed</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Who Uses This Tool?</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🎓 Students & Educators</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">For simulations and math tasks</li>
                            <li>Classroom experiments</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">💻 Developers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Generate test data</li>
                            <li>Embed randomness in scripts</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🎯 Marketers & Creators</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Create giveaway IDs</li>
                            <li>Generate random patterns</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">More Features at a Glance</h2>
        <ul class="mb-4">
            <li>Supports integers & decimal precision</li>
            <li>Export & copy results easily</li>
            <li>Perfect for lotteries, testing, simulations</li>
            <li>Upcoming: API & browser plugin integration</li>
        </ul>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Pro Tip</h3>
            <p>Use this tool to test random logic, generate passwords, or automate bulk data generation in your apps.</p>
        </div>

        <h2 class="h4 mb-3 mt-4">Explore More Tools on AllToolsFree</h2>
        <div class="row">
            <div class="col-md-4 mb-2">
                <a href="#" class="text-dark d-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-2">🧬</div>
                            <div class="font-weight-medium">UUID Generator</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="#" class="text-dark d-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-2">🗂️</div>
                            <div class="font-weight-medium">JSON Formatter</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="#" class="text-dark d-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-2">🔍</div>
                            <div class="font-weight-medium">WHOIS Checker</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <p class="mt-4">Try the Number Generator Tool Now — <strong>100% Free</strong> and accessible at <a href="https://alltolsfree.com/number-generator" target="_blank">alltolsfree.com/number-generator</a></p>
    </div>
</div>
