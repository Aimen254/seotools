@extends('layouts.app')

@section('site_title', formatTitle([__('Privacy Policy'), config('settings.title')]))

@section('head_content')
@endsection

@section('content')
<div class="bg-base-1 d-flex align-items-center flex-fill">
    <div class="container h-100 py-6">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <h1 class="h2 mb-4 text-center">{{ __('Privacy Policy') }}</h1>

                <p class="text-muted mt-2"><strong>Last updated:</strong> April 25, 2025</p>

                <p>Welcome to <strong>AllToolsFree.com</strong>. This Privacy Policy describes how we collect, use, and protect your information when you use our website and services.</p>

                <h2 class="h4 mt-4">1. Information We Collect</h2>
                <p>We may collect minimal information necessary to operate and improve our services. This includes:</p>
                <ul>
                    <li>Usage data such as your IP address, browser type, device information, and access times.</li>
                    <li>Information you voluntarily provide, like messages sent through our contact form.</li>
                </ul>

                <h2 class="h4 mt-4">2. How We Use Your Information</h2>
                <p>We use the information we collect to:</p>
                <ul>
                    <li>Maintain and improve our website and services.</li>
                    <li>Monitor usage to protect against fraudulent or malicious activity.</li>
                    <li>Respond to your inquiries and requests.</li>
                </ul>

                <h2 class="h4 mt-4">3. Cookies</h2>
                <p>We may use cookies to enhance your experience. Cookies are small data files stored on your device. You can control cookies through your browser settings.</p>

                <h2 class="h4 mt-4">4. Third-Party Services</h2>
                <p>We may use third-party services like analytics tools that collect, monitor, and analyze website traffic. These third parties have their own privacy policies addressing how they use such information.</p>

                <h2 class="h4 mt-4">5. Data Security</h2>
                <p>We implement appropriate technical and organizational measures to protect your information from unauthorized access, disclosure, or destruction. However, no method of transmission over the Internet is 100% secure.</p>

                <h2 class="h4 mt-4">6. Your Rights</h2>
                <p>You have the right to:</p>
                <ul>
                    <li>Access, update, or delete your personal information.</li>
                    <li>Opt-out of communications (if applicable).</li>
                    <li>Restrict or object to certain types of data processing.</li>
                </ul>

                <h2 class="h4 mt-4">7. Changes to This Privacy Policy</h2>
                <p>We may update our Privacy Policy from time to time. We will post any changes on this page with an updated "Last Updated" date.</p>

                <h2 class="h4 mt-4">8. Contact Us</h2>
                <p>If you have any questions about this Privacy Policy, please contact us at:</p>
                <p>
                    📧 <strong>Email:</strong> {{ config('settings.contact_email') }}<br>
                    🌐 <strong>Website:</strong> <a href="https://www.alltoolsfree.com" target="_blank">www.alltoolsfree.com</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@include('shared.sidebars.user')
