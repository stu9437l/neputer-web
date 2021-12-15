<script>
    $(document).ready(function () {
        $('#form-validation').validate({
            rules: {
                'name': "required",
                'phone': "required",
                'tac': "required",
                'email':{
                    required: true,
                    email: true
                },
                'message':{
                    required: true,
                },
                'subject':{
                    required: true,
                },
            },
        });
    });

</script>
