<script src="{{asset('assets/panel/js/jquery.validate.min.js')}}"></script>
<script>
    $(document).ready(function () {

        $('#user-form').validate({
           'email': 'required',
           'password': 'required',
           'password_confirmation': 'required',
           'first_name': 'required',
           'last_name': 'required',
           'role[]': 'required',
        });
    });
</script>