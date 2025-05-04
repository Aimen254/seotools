@extends('layouts.app')
@section('site_title', formatTitle('Terms of Service | AllToolsFree - Free Online Tools'))
@section('site_description', formatTitle('Review our Terms of Service for using AllToolsFree.com - Your trusted platform for free DNS lookup, development tools, content converters & more.'))
@section('head_content')
@endsection

@section('content')
<div class="bg-base-1 d-flex align-items-center flex-fill">
    <div class="container h-100 py-6">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">

                <div class="text-center mb-5">
                    <h1 class="display-4 font-weight-bold">{{ __('Terms of Service') }}</h1>
                    <p class="text-muted mt-2"><strong>Last updated:</strong> {{ date('F j, Y') }}</p>
                </div>

                <div class="border-top pt-4 mt-4">
                    <p>Welcome to <strong>AllToolsFree.com</strong>, your premier destination for free online tools including <a href="#" class="text-primary">DNS lookup</a>, <a href="#" class="text-primary">SEO analyzers</a>, and <a href="#" class="text-primary">content optimization utilities</a>. These Terms govern your use of our 50+ free web tools.</p>
                </div>

                <div class="border-top pt-4 mt-5">
                    <h2 class="h4 font-weight-bold mb-3">1. Acceptable Use of Tools</h2>
                    <p>AllToolsFree.com provides three categories of free tools:</p>
                    
                    <div class="card border-0 shadow-lg mt-3 mb-4 bg-success">
                        <div class="card-body">
                            <h3 class="h5 text-white">🔍 Research Tools</h3>
                            <p class="text-white">DNS lookup, WHOIS lookup, SSL checker, and other technical utilities for website analysis.</p>
                        </div>
                    </div>

                    <div class="card border-0 shadow-lg mb-4 bg-success">
                        <div class="card-body">
                            <h3 class="h5 text-white">💻 Development Tools</h3>
                            <p class="text-white">Code minifiers, validators, and generators including JSON validator, HTML minifier, and password generator.</p>
                        </div>
                    </div>

                    <div class="card border-0 shadow-lg bg-success">
                        <div class="card-body">
                            <h3 class="h5 text-white">✍️ Content Tools</h3>
                            <p class="text-white">Word counter, text cleaner, case converter and other writing/SEO optimization utilities.</p>
                        </div>
                    </div>

                    <p class="mt-4"><strong>You agree not to:</strong></p>
                    <ul class="list-unstyled pl-4">
                        <li class="mb-2">• Use our <a href="#" class="text-primary">SEO tools</a> for spam or blackhat techniques</li>
                        <li class="mb-2">• Overload our servers with automated requests to tools like our <a href="#" class="text-primary">API validators</a></li>
                        <li class="mb-2">• Scrape or redistribute tool outputs commercially without permission</li>
                    </ul>
                </div>

                <div class="border-top pt-4 mt-5">
                    <h2 class="h4 font-weight-bold mb-3">2. Content Ownership</h2>
                    <p>When using our <a href="#" class="text-primary">content tools</a> (word counter, text converter, etc.):</p>
                    <ul class="list-unstyled pl-4">
                        <li class="mb-2">• You retain ownership of all submitted content</li>
                        <li class="mb-2">• We never store or claim rights to your documents</li>
                        <li class="mb-2">• Tool outputs may not be used for illegal purposes</li>
                    </ul>
                </div>

                <div class="border-top pt-4 mt-5">
                    <h2 class="h4 font-weight-bold mb-3">3. Tool Accuracy</h2>
                    <p>While we strive for accuracy in tools like our <a href="#" class="text-primary">SEO analyzers</a> and <a href="#" class="text-primary">code validators</a>:</p>
                    <ul class="list-unstyled pl-4">
                        <li class="mb-2">• Results are provided "as-is" without guarantees</li>
                        <li class="mb-2">• Technical tools (SSL checker, DNS lookup) rely on third-party data</li>
                        <li class="mb-2">• Always verify critical results independently</li>
                    </ul>
                </div>

                <div class="border-top pt-4 mt-5">
                    <h2 class="h4 font-weight-bold mb-3">4. Prohibited Activities</h2>
                    <p>When using our <a href="#" class="text-primary">developer tools</a> or <a href="#" class="text-primary">research utilities</a>, you may not:</p>
                    <ul class="list-unstyled pl-4">
                        <li class="mb-2">• Reverse engineer tools like our <a href="#" class="text-primary">minifiers</a> or <a href="#" class="text-primary">converters</a></li>
                        <li class="mb-2">• Create automated scripts that overload our services</li>
                        <li class="mb-2">• Use our <a href="#" class="text-primary">network tools</a> for illegal surveillance</li>
                    </ul>
                </div>

                <div class="border-top pt-4 mt-5">
                    <h2 class="h4 font-weight-bold mb-3">5. Changes to Tools</h2>
                    <p>We continuously improve our <a href="#" class="text-primary">free toolset</a> and may:</p>
                    <ul class="list-unstyled pl-4">
                        <li class="mb-2">• Add/remove tools (currently offering 50+ utilities)</li>
                        <li class="mb-2">• Change tool interfaces and functionality</li>
                        <li class="mb-2">• Implement usage limits if needed</li>
                    </ul>
                </div>

                <div class="border-top pt-4 mt-5">
                    <h2 class="h4 font-weight-bold mb-3">6. Privacy Commitment</h2>
                    <p>Our <a href="{{ route('privacy') }}" class="text-primary font-weight-bold">Privacy Policy</a> details how we handle data across all tools:</p>
                    <ul class="list-unstyled pl-4">
                        <li class="mb-2">• No registration required for most tools</li>
                        <li class="mb-2">• Inputs to tools like <a href="#" class="text-primary">text analyzers</a> are never stored</li>
                        <li class="mb-2">• Minimal analytics to improve service quality</li>
                    </ul>
                </div>

                <div class="border-top pt-4 mt-5">
                    <h2 class="h4 font-weight-bold mb-3">7. Contact Our Team</h2>
                    <p>For questions about tool usage or these Terms:</p>
                    <div class="card border-0 shadow-lg mt-3 bg-success">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2 text-white">📧 <strong>Tool Support:</strong> {{ config('settings.contact_email') }}</li>
                                <li class="text-white">🌐 <strong>Visit:</strong> <a href="https://www.alltoolsfree.com" class="text-primary font-weight-bold" target="_blank">AllToolsFree.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@include('shared.sidebars.user')