@section('site_title', formatTitle('Free Password Generator Tool | Create Strong & Secure Passwords | AllToolsFree.com'))  
@section('site_description', formatTitle('Generate strong, random, and secure passwords instantly with our free online password generator. Perfect for enhancing account security—customize length, symbols, and complexity. No registration needed.'))  
@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Password generator') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Password generator') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.password_generator') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
            @cannot('tools', ['App\Models\User'])
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
            @endcannot

            @csrf

            <div class="form-group">
                <label for="i-length">{{ __('Length') }}</label>
                <input type="number" name="length" id="i-length" class="form-control{{ $errors->has('length') ? ' is-invalid' : '' }}" value="{{ $length ?? (old('length') ?? '6') }}">
                @if ($errors->has('length'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('length') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input{{ $errors->has('lower_case') ? ' is-invalid' : '' }}" name="lower_case" id="i-lower-case" value="1" @if(old('lower_case') || !isset($lowerCase) || $lowerCase) checked @endif>
                    <label class="custom-control-label" for="i-lower-case">{{ __('Lower case') }}</label>
                    @if ($errors->has('lower_case'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lower_case') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input{{ $errors->has('upper_case') ? ' is-invalid' : '' }}" name="upper_case" id="i-upper-case" value="1" @if(old('upper_case') || !isset($upperCase) || $upperCase) checked @endif>
                    <label class="custom-control-label" for="i-upper-case">{{ __('Upper case') }}</label>
                    @if ($errors->has('upper_case'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('upper_case') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input{{ $errors->has('digits') ? ' is-invalid' : '' }}" name="digits" id="i-digits" value="1" @if(old('digits') || !isset($digits) || $digits) checked @endif>
                    <label class="custom-control-label" for="i-digits">{{ __('Digits') }}</label>
                    @if ($errors->has('digits'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('digits') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input{{ $errors->has('symbols') ? ' is-invalid' : '' }}" name="symbols" id="i-symbols" value="1" @if(old('symbols') || !isset($symbols) || $symbols) checked @endif>
                    <label class="custom-control-label" for="i-symbols">{{ __('Symbols') }}</label>
                    @if ($errors->has('symbols'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('symbols') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Generate') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.password_generator') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
        <h1 class="h3 mb-3">Password Generator Tool - Create Strong, Secure Passwords Instantly</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">🔒</div>
                <div>Generate ultra-secure passwords with our free online tool. Protect your accounts with military-grade passwords featuring customizable length, special characters, and complexity options.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Generation</span>
            <span class="badge badge-info mb-2">✅ No Data Storage</span>
        </div>

        <h2 class="h4 mb-3">Why Use Our Password Generator?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🛡️ Maximum Security</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Prevent brute force attacks</li>
                            <li class="mb-1">Resist dictionary attacks</li>
                            <li>Protect against credential stuffing</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔢 Custom Complexity</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">8-64 character length</li>
                            <li>Special characters & numbers</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">💻 Cross-Platform Use</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Works on all devices</li>
                            <li>No installation required</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔑 Multiple Password Types</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Memorable passphrases</li>
                            <li>Random character strings</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Generate Secure Passwords</h2>
        
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
                        <td>Set password length (8-64 chars)</td>
                        <td>Default 12-character strong password</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Toggle character types (upper/lower/special)</td>
                        <td>Custom complexity options</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Click "Generate Password"</td>
                        <td>Multiple secure password options</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Key Security Features</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🔐 Client-Side Generation</h3>
                        <p>Passwords are created in your browser - never sent to our servers</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚡ Instant Copy</h3>
                        <p>One-click copy to clipboard with auto-clear after 60 seconds</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📊 Strength Meter</h3>
                        <p>Visual indicator shows password security level</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 Security Expert Tip</h3>
            <p>For optimal protection:</p>
            <ul class="mb-0">
                <li>Use 16+ characters for critical accounts</li>
                <li>Enable two-factor authentication (2FA)</li>
                <li>Never reuse passwords across sites</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Who Needs This Tool?</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💻 IT Professionals</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Secure system credentials</li>
                            <li>Generate temporary access codes</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👩‍💻 Regular Users</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Protect social media accounts</li>
                            <li>Secure online banking</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💼 Business Owners</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Create employee credentials</li>
                            <li>Secure company accounts</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">Password Strength Comparison</h2>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Password Type</th>
                        <th>Example</th>
                        <th>Time to Crack</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Weak</strong></td>
                        <td>password123</td>
                        <td>Instant</td>
                    </tr>
                    <tr>
                        <td><strong>Moderate</strong></td>
                        <td>P@ssw0rd</td>
                        <td>3 hours</td>
                    </tr>
                    <tr>
                        <td><strong>Strong (Ours)</strong></td>
                        <td>XK8$qL2#mN9!pR5%</td>
                        <td>34 million years</td>
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
                            How are these passwords more secure?
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Our generator creates truly random passwords using cryptographic algorithms, avoiding human patterns that make passwords guessable.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            Can I generate memorable passwords?
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ Yes! Use our "Passphrase" mode to create combinations like "CorrectHorseBatteryStaple" that are both secure and memorable.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            Is there a limit to how many I can generate?
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        No limits! Generate hundreds of passwords if needed - perfect for setting up multiple accounts or bulk credential creation.
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h5 mb-3">Explore More Security Tools</h3>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔐</div>
                                    <div class="font-weight-medium">MD5 Generator</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🛡️</div>
                                    <div class="font-weight-medium">SSL Checker</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔍</div>
                                    <div class="font-weight-medium">HTTP Headers Checker</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>