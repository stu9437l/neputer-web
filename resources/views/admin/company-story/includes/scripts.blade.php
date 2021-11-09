<script src="{{asset('assets/panel/js/jquery.validate.min.js')}}"></script>
<script>
    $(document).ready(function () {

        $('.pick-year').datepicker({
            minViewMode: 2,
            format: 'yyyy'
        });

        $('#company-story-form').validate({
            'year': 'required',
        });
    });
</script>