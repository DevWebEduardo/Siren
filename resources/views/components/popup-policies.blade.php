        <section>
            <div id="consentPopup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white p-6 rounded shadow-lg">
                    <h2 class="text-center text-xl font-bold mb-4">{{ __('Please consent to our policies and terms') }}</h2>
                    <!-- Add your policies and terms content here -->
                    <p class="mb-4">
                        {{ __('Please be informed that this site utilizes cookies to enhance your interaction and may collect data related to your activities here.') }}
                        {{ __('To learn more about our policies and privacy practices, feel free to read') }}<a href="/terms" class="underline">{{ __('Terms of Use') }}</a> and <a href="/privacy-policy" class="underline">{{ __('Privacy Policy') }}</a>.
                    </p>
                    <p>
                        {{ __('Your privacy is important, and we are committed to being transparent about how we handle your information.') }}
                    </p>
                    <br>
                    <button id="consentButton" class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">{{ __('I Consent') }}</button>
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const consentPopup = document.getElementById("consentPopup");
                    const consentButton = document.getElementById("consentButton");

                    if (!localStorage.getItem("hasConsented")) {
                    consentPopup.classList.remove("hidden");
                    }

                    consentButton.addEventListener("click", function () {
                    consentPopup.classList.add("hidden");
                    localStorage.setItem("hasConsented", true);
                    });
                });
            </script>
        </section>