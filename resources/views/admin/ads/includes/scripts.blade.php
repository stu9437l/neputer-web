<script>
    $(document).ready(function () {

        var showContent = '{{ $errors->has('content') }}';
        var showBanner = '{{ $errors->has('image') }}';

        if(showContent){
            $('#content').show();
            $('.banner').hide();
        }

        if(showBanner){
            $('#content').hide();
            $('.banner').show();
        }

        $('#ad_type').change(function () {
            if ($(this).val() == 'script') {
                $('#content').show();
            } else {
                $('#content').hide();
            }

            if ($(this).val() == 'banner') {
                $('.banner').show();
            } else {
                $('.banner').hide();
            }


        });
    })
</script>