<script defer type="text/javascript">
    $(document).ready(function(){

        $(function () {

            $("#mobile").mask("(999) 999-9999");
            $("#phone").mask("(99)-9999999");

            $(".mobileNum").intlTelInput({
                allowDropdown: true,
                formatOnDisplay: true,
                autoPlaceholder: true,
                customPlaceholder: function (selectedCountryPlaceholder, selectedCountryData) {
                    return "e.g. " + '9800000000';
                },
                // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                //placeholderNumberType: "MOBILE",
                preferredCountries: ['np'],
                separateDialCode: true,
                utilsScript: "{{ asset('Frontend/js/utils.js')}}"
            });
            $(".phoneNum").intlTelInput({
                allowDropdown: true,
                formatOnDisplay: false,
                autoPlaceholder: true,
                customPlaceholder: function (selectedCountryPlaceholder, selectedCountryData) {
                    return "e.g. " + '01-1000000';
                },
                // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                //placeholderNumberType: "MOBILE",
                preferredCountries: ['np'],
                separateDialCode: true,
                utilsScript: "{{ asset('Frontend/js/utils.js')}}"
            });

        });

    });
</script>