@extends('layouts.main')
@section('title', 'Privacy Policy')
@section('content')
    <div class="w-full bg-slate-300 lg:mt-2 rounded py-4 px-2 text-lg">
        <h3 class="text-xl sm:text-2xl font-medium text-center">{{ __("Privacy Policy") }}</h3>

        <p class="mb-6 text-center">Last Updated: 00:01 24/07/2023 (BRT)</p>
        <div class="px-1 sm:px-4 md:px-8">
            <p class="mb-4">Welcome to Siren, a real estate listings website. The privacy of our users is of utmost
                importance to us, and thus we have developed this Privacy Policy to explain how we collect, use, disclose,
                and protect users' personal information during their use of our website.</p>

            <p class="mb-4">By accessing or using Siren, you agree to the terms outlined in this Privacy Policy. If you do
                not agree with any of these terms, please refrain from using our services.</p>

            <h3 class="text-xl font-semibold mb-2">1. Information Collection</h3>
            <p class="mb-4">1.1. <strong>Public Listing Information:</strong> As a real estate listings website, we collect
                information provided by authors of listings. This information may include, but is not limited to,
                descriptions, images, location, price, and contact information.</p>

            <p class="mb-4">1.2. <strong>Contact Information:</strong> If the listing author chooses to provide contact
                information, such as name, email address, phone number, or other personal contact details, this data may be
                collected and made publicly available unless otherwise indicated.</p>

            <p class="mb-4">1.3. <strong>Access Information:</strong> We may collect information about your device, browser,
                and IP address to improve user experience and ensure site security. This information is obtained through
                cookies and similar technologies, as explained in our Cookie Policy.</p>

            <h3 class="text-xl font-semibold mb-2">2. Use of Information</h3>
            <p class="mb-4">2.1. The information collected on Siren is solely used to provide real estate listings to
                interested users.</p>

            <p class="mb-4">2.2. Data provided by listing authors is considered public, and we disclaim responsibility for
                the accuracy, legality, or authenticity of such information.</p>

            <p class="mb-4">2.3. We will not use the provided contact information for direct marketing purposes unless we
                have obtained explicit user consent.</p>

            <h3 class="text-xl font-semibold mb-2">3. Information Sharing</h3>
            <p class="mb-4">3.1. The information published by listing authors is visible to all website visitors and may be
                indexed by external search engines.</p>

            <p class="mb-4">3.2. We will not disclose users' personal information to third parties, except when required by
                law or for compliance with a court order.</p>

            <h3 class="text-xl font-semibold mb-2">4. Information Security</h3>
            <p class="mb-4">4.1. We employ appropriate security measures to protect the information collected and stored on
                Siren. However, we cannot guarantee the absolute security of this information given the nature of the
                internet.</p>

            <p class="mb-4">4.2. Listing authors are responsible for safeguarding their account access information and
                should take necessary measures to prevent unauthorized access.</p>

            <h3 class="text-xl font-semibold mb-2">5. Content Removal</h3>
            <p class="mb-4">5.1. If you find personal content or sensitive information posted by third parties on Siren that
                you wish to have removed, please contact us through the following email: <a class="text-blue-700">solanin.services@gmail.com</a>.
                We will promptly review your request and, if necessary, take appropriate actions.</p>

            <h3 class="text-xl font-semibold mb-2">6. Changes to this Policy</h3>
            <p class="mb-4">6.1. We reserve the right to modify this Privacy Policy at any time. Any changes will be posted
                on this page, and the last updated date will be adjusted.</p>

            <h3 class="text-xl font-semibold mb-2">7. Contact</h3>
            <p class="mb-6">7.1. If you have any questions or concerns regarding this Privacy Policy, please contact us
                through the link: <a class="text-blue-500" href="https://sirenwebsite.com/contact/">https://sirenwebsite.com/contact/</a>.</p>

            <p class="mt-6">This Privacy Policy applies solely to Siren and does not extend to third-party websites that may
                be linked on our site. By using our website, you acknowledge that you have read and understood this Privacy
                Policy and agree to its terms and conditions.</p>
        </div>
    </div>
@endsection
