<script src="{{asset('assets/panel/js/jquery.validate.min.js')}}"></script>
<script>
    $(document).ready(function () {

        $('#portfolio-cat-form').validate({
            'title': 'required',
        });
    });
</script>