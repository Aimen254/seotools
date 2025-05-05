@section('site_title', formatTitle('Free Uptime Calculator | Calculate Website Availability | AllToolsFree.com'))
@section('site_description', formatTitle('Easily calculate your website uptime percentage & downtime with our free online tool. Essential for webmasters, developers & IT professionals to monitor service reliability.'))
@include('shared.breadcrumbs', ['breadcrumbs' => [
    ['url' => auth()->check() ? route('dashboard') : route('home'), 'title' => __('Home')],
    ['url' => route('tools'), 'title' => __('Tools')],
    ['title' => __('Tool')],
]])

<div class="d-flex">
    <h1 class="h2 mb-3 text-break">{{ __('Uptime calculator') }}</h1>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header align-items-center">
        <div class="row">
            <div class="col">
                <div class="font-weight-medium py-1">{{ __('Uptime calculator') }}</div>
            </div>
        </div>
    </div>
    <div class="card-body position-relative">
        @include('shared.message')

        <form action="{{ route('tools.uptime_calculator') }}" method="post" enctype="multipart/form-data" @cannot('tools', ['App\Models\User']) class="position-relative opacity-20 min-height-80" @endcannot>
            @cannot('tools', ['App\Models\User'])
                <div class="position-absolute top-0 right-0 bottom-0 left-0 z-1 bg-fade-0"></div>
            @endcannot

            @csrf

            <div class="form-group">
                <label for="i-percentage">{{ __('Percentage') }}</label>
                <div class="input-group">
                    <input type="number" name="percentage" id="i-percentage" class="form-control{{ $errors->has('percentage') ? ' is-invalid' : '' }}" step="any" value="{{ $percentage ?? (old('percentage') ?? '99.99') }}">
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
                @if ($errors->has('percentage'))
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first('percentage') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row mx-n2">
                <div class="col px-2">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('Calculate') }}</button>
                </div>
                <div class="col-auto px-2">
                    <a href="{{ route('tools.uptime_calculator') }}" class="btn btn-outline-secondary {{ (__('lang_dir') == 'rtl' ? 'mr-auto' : 'ml-auto') }}">{{ __('Reset') }}</a>
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
        <div class="card-body">
            <div class="list-group list-group-flush my-n3">
                <div class="list-group-item px-0 text-muted">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    {{ __('Period') }}
                                </div>

                                <div class="col-12 col-md-4">
                                    {{ __('Uptime') }}
                                </div>

                                <div class="col-12 col-md-4">
                                    {{ __('Downtime') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach([__('Day') => 86400, __('Week') => 86400 * 7, __('Month') => 86400 * 30, __('Year') => 86400 * 365] as $key => $value)
                    <div class="list-group-item px-0">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                {{ $key }}
                            </div>
                            <div class="col-12 col-md-4 text-success">
                                {{ (clone $now)->diffForHumans((clone $now)->subSeconds(round(($value / 100) * $percentage)), ['syntax' => true, 'parts' => 3, 'join' => true, 'short' => true]) }}
                            </div>
                            <div class="col-12 col-md-4 text-danger">
                                {{ (clone $now)->diffForHumans((clone $now)->subSeconds(round(($value / 100) * (100-$percentage))), ['syntax' => true, 'parts' => 3, 'join' => true, 'short' => true]) }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
<div class="card border-0 shadow-sm mt-4 p-3">
    <div class="card-body">
        <h1 class="h3 mb-3">Uptime Calculator - Measure Your Website Availability</h1>
        
        <div class="alert alert-info mb-4">
            <div class="d-flex">
                <div class="mr-3">⏱️</div>
                <div>Calculate your website's uptime percentage, downtime duration, and SLA compliance with our free online calculator. Essential tool for webmasters, sysadmins, and hosting providers.</div>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-4">
            <span class="badge badge-success mr-2 mb-2">✅ 100% Free</span>
            <span class="badge badge-primary mr-2 mb-2">✅ Instant Results</span>
            <span class="badge badge-info mb-2">✅ No Registration</span>
        </div>

        <h2 class="h4 mb-3">Why Calculate Uptime?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📈 SLA Monitoring</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Verify hosting guarantees</li>
                            <li class="mb-1">Calculate compliance penalties</li>
                            <li>Measure service reliability</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">💰 Cost Analysis</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Estimate revenue impact</li>
                            <li>Calculate downtime losses</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🛠️ Performance Tracking</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Compare hosting providers</li>
                            <li>Identify improvement areas</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📊 Reporting</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Create uptime reports</li>
                            <li>Share with stakeholders</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">How to Calculate Uptime</h2>
        
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
                        <td>Enter total monitoring period</td>
                        <td>Days, weeks, or months</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Input downtime duration</td>
                        <td>Hours and minutes</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Click "Calculate"</td>
                        <td>Instant uptime percentage</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="h4 mb-3">Key Features</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📆 Multiple Timeframes</h3>
                        <p>Calculate daily, weekly, monthly, or yearly uptime</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">⚡ Instant Conversion</h3>
                        <p>Convert between percentages and downtime minutes</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📈 SLA Visualization</h3>
                        <p>See how your uptime compares to common SLA tiers</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-5 bg-primary mt-4 p-4 shadow-lg text-white">
            <h3 class="h5 mb-3">💡 System Admin Tip</h3>
            <p>For mission-critical services:</p>
            <ul class="mb-0">
                <li>Aim for 99.99% ("four nines") uptime</li>
                <li>That's just 52.6 minutes downtime/year</li>
                <li>Use redundant systems to minimize outages</li>
            </ul>
        </div>

        <h2 class="h4 mb-3 mt-4">Who Uses This Tool?</h2>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">👨‍💻 System Administrators</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Monitor server reliability</li>
                            <li>Verify backup systems</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">🏢 Hosting Providers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Prove SLA compliance</li>
                            <li>Calculate service credits</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">📊 Digital Marketers</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Measure campaign impacts</li>
                            <li>Track site availability</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 mb-3 mt-4">Uptime Standards Comparison</h2>
        
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Uptime %</th>
                        <th>"Nines"</th>
                        <th>Annual Downtime</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>99%</strong></td>
                        <td>Two nines</td>
                        <td>3 days 15 hours</td>
                    </tr>
                    <tr>
                        <td><strong>99.9%</strong></td>
                        <td>Three nines</td>
                        <td>8 hours 46 minutes</td>
                    </tr>
                    <tr>
                        <td><strong>99.99%</strong></td>
                        <td>Four nines</td>
                        <td>52 minutes</td>
                    </tr>
                    <tr>
                        <td><strong>99.999%</strong></td>
                        <td>Five nines</td>
                        <td>5 minutes</td>
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
                            How is uptime percentage calculated?
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Uptime % = (Total Time - Downtime) / Total Time × 100. Our tool handles all calculations automatically when you input your monitoring period and outage duration.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingTwo">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            What's considered good uptime for a website?
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        ✅ For most businesses, 99.9% (three nines) is acceptable. Critical services should aim for 99.99%. Our calculator shows exactly how much downtime each percentage represents.
                    </div>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mb-2">
                <div class="card-header bg-white" id="headingThree">
                    <h3 class="mb-0">
                        <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">
                            Can I calculate projected uptime?
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Yes! Enter your current uptime stats to project future reliability or see how improvements would affect your percentages. Great for SLA negotiations and capacity planning.
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h5 mb-3">Explore More Webmaster Tools</h3>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <a href="#" class="text-dark d-block">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-2">🔍</div>
                                    <div class="font-weight-medium">Website Status Checker</div>
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
                                    <div class="mb-2">🔄</div>
                                    <div class="font-weight-medium">Redirect Checker</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>