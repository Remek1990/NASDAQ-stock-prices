
$(document).ready(function() {

    $('form').submit(function() {

        var data = {'form':{}};
        data['form']['stock'] = $('#search').val();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).data('action'),
            data,
            success: function(result) {
                var message = result;
                $('.message_form').text(message);
            }
        });

        return false;
    });

});