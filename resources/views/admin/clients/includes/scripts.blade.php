<script src="{{asset('assets/panel/js/jquery.validate.min.js')}}"></script>
<script>
    $(document).ready(function () {

        $('#clients-form').validate({
            'year': 'required',
        });
    });
</script>