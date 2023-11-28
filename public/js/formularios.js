

jQuery('#btnRegistro').on('blur', function (e) {

    e.preventDefault();

    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    jQuery.ajax({
        url: "{{ url('/verificaDni') }}",
        method: 'get',
        data: {
            name: jQuery('#footballername').val(),
        },
        success: function (data) {
            jQuery.each(data.errors, function (key, value) {
                jQuery('.alert-danger').show();
                jQuery('.alert-danger').append('<p>' + value + '</p>');
            });
        }

    });
});
