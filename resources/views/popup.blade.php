{{-- <style>
    .eu-popup {
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        align-content: center;
        padding: 20px;
        z-index: 4242;
        flex-wrap: wrap;
        background-color: white;
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.75);
        margin: 20px;
        border-radius: 20px;
    }

    .eu-popup-button {
        background-color: white;
        padding: 10px;
        padding-left: 20px;
        padding-right: 20px;
        border: 1px lightgray solid;
        border-radius: 10px;
    }

    .eu-popup-button:hover {
        background-color: lightgray;
        cursor: pointer;
    }

</style> --}}
<script type="application/javascript">
    function euCookieConsentSetCheckboxesByClassName(classname) {
        checkboxes = document.getElementsByClassName('eu-cookie-consent-cookie');
        for (i = 0; i < checkboxes.length; i++) {
            checkboxes[i].setAttribute('checked', 'checked');
            checkboxes[i].checked = true;
        }
    }
</script>
{{-- Popup Container --}}
<div style="{{ config('eu-cookie-consent.popup_style') }}"
    class="{{ config('eu-cookie-consent.popup_classes') }}  shadow-md max-w-sm fixed right-0 bottom-0 mx-4 mb-4 p-4 rounded-lg border-2 border-yellow-200 text-gray-500 dark:text-yellow-200 bg-white dark:bg-gray-900">
    {{-- Popup Title gets displayed if its set in the config --}}
    @if (isset($config['title']))
        <div style="width: 100%">
            <p>
                <b>
                    {{-- Popup MultiLanguageSupport defines if the Text is written from the lang file or directly form the Config. --}}
                    @if ($multiLanguageSupport)
                        {{ __('eu-cookie-consent::cookies.' . $config['title']) }}
                    @else
                        {{ $config['title'] }}
                    @endif
                </b>
            </p>
        </div>
    @endif
    {{-- Popup Description --}}
    @if (isset($config['description']))
        <div style="width: 100%">
            @if ($multiLanguageSupport)
                {{ __('eu-cookie-consent::cookies.' . $config['description']) }}
            @else
                {{ $config['description'] }}
            @endif
        </div>
    @endif

    {{-- Popup Form which renders the Cateries and inside of them the single Cookies --}}





    <form action="{{ config('eu-cookie-consent.route') }}" method="POST">
        <div style="width: 100%;">

            @foreach ($config['categories'] as $categoryName => $category)
                @include('eu-cookie-consent::category')
            @endforeach
        </div>
        <div style="margin-top: 20px;">
            @if (config('eu-cookie-consent.acceptAllButton'))
                {{-- this is the default settings but i used tailwing css
                     <button class="eu-popup-button"
                    onclick="euCookieConsentSetCheckboxesByClassName('eu-cookie-consent-cookie');">
                    @if ($multiLanguageSupport)
                        {{ __('eu-cookie-consent::cookies.acceptAllButton') }}
                    @else
                        {{ $config['acceptAllButton'] }}
                    @endif
                </button> --}}

                <button onclick="euCookieConsentSetCheckboxesByClassName('eu-cookie-consent-cookie');"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg eu-popup-button hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-green-500">
                    @if ($multiLanguageSupport)
                        {{ __('eu-cookie-consent::cookies.acceptAllButton') }}
                    @else
                        {{ $config['acceptAllButton'] }}
                    @endif
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            @endif
            {{-- this is the default settings but i used tailwing css
                
                <button id="saveButton" type="submit" class="eu-popup-button">
                @if ($multiLanguageSupport)
                    {{ __('eu-cookie-consent::cookies.save') }}
                @else
                    {{ $config['saveButton'] }}
                @endif
            </button> --}}
            <button type="submit"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg eu-popup-button hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-green-500">
                @if ($multiLanguageSupport)
                    {{ __('eu-cookie-consent::cookies.save') }}
                @else
                    {{ $config['saveButton'] }}
                @endif
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z">
                    </path>
                </svg>
            </button>
        </div>
    </form>
</div>
