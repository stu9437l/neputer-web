{{--<script src="{{asset('assets/panel/js/jquery.validate.min.js')}}"></script>--}}
<script>
    $( document ).ready( function () {

        @if(count($errors) > 0)
        $('.modal').show();
        $('.closes').on('click', function () {
            $('.modal').hide();
            $(".modal input").val("");
            $(".modal textarea").val("");
            $(".modal").find('.has-error').html("");
        })
        @endif

    })

</script>
<script type="text/javascript">
    $(function (){
        $('.service-key-points').find('ul').addClass('key-points mt20');
        $('.col-lg-7').find('ul').addClass('service-point-2 mt20');

        // $('#contact-form').validate();
    })
</script>
