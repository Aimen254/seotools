@extends('layouts.app')

@section('site_title', formatTitle([__('Terms of Service'), config('settings.title')]))

@section('head_content')
@endsection

@section('content')
<div class="bg-base-1 d-flex align-items-center flex-fill">
    <div class="container h-100 py-6">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">

                <div class="text-center mb-5">
                    <h1 class="display-4 font-weight-bold">{{ __('Terms of Service') }}</h1>
                    <p class="text-muted mt-2"><strong>Last updated:</strong> April 25, 2025</p>
                </div>

                <div class="border-top pt-4 mt-4">
                    <p>Welcome to <strong>AllToolsFree.com</strong>. Please read these Terms of Service ("Terms", "Terms of Service") carefully before using our website and any services, tools, or content operated by AllToolsFree.com ("us", "we", or "our").</p>
                    <p>By accessing or using the website, you agree to be bound by these Terms. If you disagree with any part of the terms, please do not use our website.</p>
                </div>

                <div class="border-top pt-4 mt-5">
                    <h2 class="h4 font-weight-bold mb-3">1. Use of Our Services</h2>
                    <p>AllToolsFree.com provides free access to a variety of tools for SEO, content creation, web development, and more. You may use these tools for personal and commercial purposes, subject to compliance with these Terms.</p>
                    <p><strong>You agree to:</strong></p>
                    <ul class="list-unstyled pl-4">
                        <li class="mb-2">• Use the tools only for lawful purposes.</li>
                        <li class="mb-2">• Not use the tools to harm, disrupt, or interfere with other users or services.</li>
                        <li class="mb-2">• Not attempt to copy, reverse engineer, or exploit our services without permission.</li>
                    </ul>
                </div>

                <div class="border-top pt-4 mt-5">
                    <h2 class="h4 font-weight-bold mb-3">2. Intellectual Property</h2>
                    <p>All content, logos, designs, software, and other materials displayed on AllToolsFree.com are the property of AllToolsFree.com or our content providers. Unauthorized use or duplication is strictly prohibited.</p>
                </div>

                <div class="border-top pt-4 mt-5">
                    <h2 class="h4 font-weight-bold mb-3">3. Disclaimer</h2>
                    <p>AllToolsFree.com provides its tools and services <strong>as-is</strong> without warranties of any kind, either express or implied. We do not guarantee the accuracy, reliability, or suitability of any tool output.</p>
                </div>

                <div class="border-top pt-4 mt-5">
                    <h2 class="h4 font-weight-bold mb-3">4. Third-Party Links</h2>
                    <p>Our website may contain links to third-party websites or services. We have no control over and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>
                </div>

                <div class="border-top pt-4 mt-5">
                    <h2 class="h4 font-weight-bold mb-3">5. Changes to Terms</h2>
                    <p>We reserve the right to update or change these Terms at any time without prior notice. Changes will be effective immediately once posted on this page. Continued use of our website means you accept those changes.</p>
                </div>

                <div class="border-top pt-4 mt-5">
                    <h2 class="h4 font-weight-bold mb-3">6. Privacy</h2>
                    <p>Please review our <a href="{{ route('privacy') }}" class="text-primary font-weight-bold">Privacy Policy</a> for information on how we collect, use, and protect your information.</p>
                </div>

                <div class="border-top pt-4 mt-5">
                    <h2 class="h4 font-weight-bold mb-3">7. Limitation of Liability</h2>
                    <p>To the fullest extent permitted by law, AllToolsFree.com shall not be liable for any indirect, incidental, special, consequential, or punitive damages, or any loss of profits or revenues related to your use of our services.</p>
                </div>

                <div class="border-top pt-4 mt-5">
                    <h2 class="h4 font-weight-bold mb-3">8. Contact Us</h2>
                    <p>If you have any questions about these Terms, please contact us at:</p>
                    <ul class="list-unstyled pl-4">
                        <li class="mb-2">📧 <strong>Email:</strong> {{ config('settings.contact_email') }}</li>
                        <li class="mb-2">🌐 <strong>Website:</strong> <a href="https://www.alltoolsfree.com" class="text-primary font-weight-bold" target="_blank">www.alltoolsfree.com</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@include('shared.sidebars.user')
