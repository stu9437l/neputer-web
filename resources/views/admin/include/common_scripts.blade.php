<script type="text/javascript">
    $(".bootbox-confirm").on('click', function() {
        var $this = $(this);
        bootbox.confirm("Are you sure to delete {{ $panel }}?", function(result) {
            if(result) {
                $this.closest('td').find('form').submit();
            }
        });
    });

    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $('#bulk-action-submit-btn').click(function () {

        var ids = '';
        $('#table-tbody').find('input:checkbox').each(function (i, v) {

            if($(v).is(':checked')){
                ids = ids + $(v).val() + ','
            }
        })


        $('#row_ids').val(ids);


        $('#bulk-action-form').submit();

    })


</script>