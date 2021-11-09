@include('admin.include.jquery_ckeditor')
<script src="{{ asset('assets/panel/js/jquery.validate.min.js')}}"></script>
<script>
    $(document).ready(function () {
        var showContent = '{{ $errors->first('content') }}';
        var showLink = '{{ $errors->first('link') }}';

        if(showContent){
            $('.page_content').show();
            $('#page_link').hide();
        }

        if(showLink){
            $('.page_content').hide();
            $('#page_link').show();
        }

        $(document).on('change', '#page_type', function () {
            if ($(this).val() == 'link') {
                $('#page_link').show();
                $('.page_content').hide();
            } else if($(this).val() == 'content') {
                $('#page_link').hide();
                $('.page_content').show();
            }
        });

    });
</script>