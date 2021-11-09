<script src="{{asset('assets/panel/js/jquery.validate.min.js')}}"></script>
<script>
    $(document).ready(function () {

        $('#cat-form').validate({
            'title': 'required',
        });
    });
</script>