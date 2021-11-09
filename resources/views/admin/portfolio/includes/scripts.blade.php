<script src="{{asset('assets/panel/js/jquery.validate.min.js')}}"></script>
<script>
    $(document).ready(function () {

        $('#portfolio-form').validate({
            'title': 'required',
            'portfolio_category_id': 'required',
        });
    });
</script>