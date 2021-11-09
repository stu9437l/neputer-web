{{--@include('admin.include.jquery_ckeditor')--}}
<script src="{{ asset('assets/panel/js/jquery.validate.min.js')}}"></script>
<script>
    $(document).ready(function () {

        var flag = '{{ isset($data['row'])}}';

        if (flag) {
            var req = false;
        } else {
            var req = "required";
        }

        $('#testimonial-form').validate({
            rules: {
                testimonial_by: "required",
                description: "required",
                // image: req,
            }
            // alt_text: "required",
            // caption: "required",
        });
    });
</script>