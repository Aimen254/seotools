@extends('layouts.app')

@section('site_title', formatTitle('Privacy Policy | Data Protection & Security | AllToolsFree.com'))
@section('site_description', formatTitle('Read our Privacy Policy to understand how AllToolsFree.com protects your data when using our 30+ free online tools for content, development & research. Your security matters.'))
@section('head_content')
@endsection

@section('content')
<div class="bg-base-1 d-flex align-items-center flex-fill">
    <div class="container h-100 py-6">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <h1 class="h2 mb-4 text-center">{{ __('Privacy Policy') }}</h1>

                <p class="text-muted mt-2"><strong>Last updated:</strong> April 25, 2025</p>

                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">
                        <h2 class="h4 mb-3">🔒 Your Privacy Matters</h2>
                        <p>At <strong>AllToolsFree.com</strong>, we're committed to protecting your personal information while you use our suite of free online tools. This Privacy Policy explains how we handle data across all our tools including:</p>
                        
                        <div class="row mt-4">
                            <div class="col-md-4 mb-3">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body">
                                        <h3 class="h6">🔍 Research Tools</h3>
                                        <ul class="small pl-3 mb-0">
                                            <li>DNS lookup</li>
                                            <li>SSL checker</li>
                                            <li>WHOIS lookup</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body">
                                        <h3 class="h6">💻 Development Tools</h3>
                                        <ul class="small pl-3 mb-0">
                                            <li>JSON validator</li>
                                            <li>Password generator</li>
                                            <li>QR generator</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body">
                                        <h3 class="h6">📝 Content Tools</h3>
                                        <ul class="small pl-3 mb-0">
                                            <li>Word counter</li>
                                            <li>Text cleaner</li>
                                            <li>Case converter</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h2 class="h4 mt-4">1. Information Collection</h2>
                        <p>We collect minimal data to operate our tools effectively:</p>
                        <div class="alert alert-light">
                            <ul class="mb-0">
                                <li><strong>Usage Data:</strong> IP address, browser type, tool usage patterns</li>
                                <li><strong>Tool Inputs:</strong> Content processed through our tools is never stored permanently</li>
                                <li><strong>Contact Info:</strong> Only when you voluntarily contact us</li>
                            </ul>
                        </div>

                        <h2 class="h4 mt-4">2. Data Usage</h2>
                        <p>We use information to:</p>
                        <div class="d-flex flex-wrap mb-3">
                            <span class="badge badge-light mr-2 mb-2">🛠️ Improve tools</span>
                            <span class="badge badge-light mr-2 mb-2">📈 Analyze usage</span>
                            <span class="badge badge-light mb-2">🛡️ Enhance security</span>
                        </div>

                        <h2 class="h4 mt-4">3. Cookies & Tracking</h2>
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <p>We use essential cookies for:</p>
                                <ul>
                                    <li>Remembering your tool preferences</li>
                                    <li>Anonymous analytics via Google Analytics</li>
                                    <li>Preventing spam and abuse</li>
                                </ul>
                                <p class="mb-0">You can manage cookies through your browser settings.</p>
                            </div>
                        </div>

                        <h2 class="h4 mt-4">4. Third-Party Services</h2>
                        <p>We may use:</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Service</th>
                                    <th>Purpose</th>
                                    <th>Data Shared</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Google Analytics</td>
                                    <td>Usage statistics</td>
                                    <td>Anonymous data</td>
                                </tr>
                                <tr>
                                    <td>Cloudflare</td>
                                    <td>Security & performance</td>
                                    <td>IP addresses</td>
                                </tr>
                            </tbody>
                        </table>

                        <h2 class="h4 mt-4">5. Data Protection</h2>
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h3 class="h5">🔐 Our Security Measures</h3>
                                <ul>
                                    <li>HTTPS encryption on all pages</li>
                                    <li>Regular security audits</li>
                                    <li>Minimal data retention policies</li>
                                </ul>
                            </div>
                        </div>

                        <h2 class="h4 mt-4">6. Your Rights</h2>
                        <p>Under GDPR and other privacy laws, you can:</p>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body">
                                        <h3 class="h6">📝 Request Access</h3>
                                        <p class="small">Ask what data we have about you</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body">
                                        <h3 class="h6">🗑️ Request Deletion</h3>
                                        <p class="small">Ask us to delete your data</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h2 class="h4 mt-4">7. Policy Updates</h2>
                        <div class="alert alert-warning">
                            <p>We may update this policy as we add new tools like:</p>
                            <ul class="mb-0">
                                <li>New research tools (IP lookup, meta tag checker)</li>
                                <li>Additional development utilities (URL parser, UTM builder)</li>
                                <li>Enhanced content tools (text reverser, slug converter)</li>
                            </ul>
                        </div>

                        <h2 class="h4 mt-4">8. Contact Us</h2>
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <p>For privacy concerns regarding any of our tools:</p>
                                <p class="mb-1">📧 <strong>Email:</strong> <a href="mailto:{{ config('settings.contact_email') }}">{{ config('settings.contact_email') }}</a></p>
                                <p class="mb-0">🌐 <strong>Visit:</strong> <a href="https://www.alltoolsfree.com" target="_blank">AllToolsFree.com</a></p>
                            </div>
                        </div>

                        <p class="small text-muted mt-4">
                            Keywords: privacy policy, free tools privacy, online tool security, data protection, GDPR compliant tools, word counter privacy, SEO tools data policy.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('shared.sidebars.user')