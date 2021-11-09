<script src="{{asset('assets/panel/js/jquery.validate.min.js')}}"></script>
<script>
    $(document).ready(function () {
        var flag = '{{ isset($data['row'])}}';

        if (flag) {
            var req = '';
        } else {
            var req = 'required';
        }

        $('#technology-form').validate({
            'title': 'required',
            // 'image': req,
        });
    });
</script>