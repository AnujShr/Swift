if (activeRoute === 'front.contact') {
    $(function () {
        $('#contactForm').submit(function (e) {
            e.preventDefault();
            let data = $(this).serialize();

            $(this).find('div').removeClass('has-error');
            $(this).find('span').html('');
            $(this).find('span').removeClass('help-block');
            $.ajax({
                data: data,
                type: 'post',
                url: '/contact',
                datatype: 'json',
                success: function (response) {
                },
                error: function (errors) {
                    $.each(errors.responseJSON.errors, function (key, value) {
                        console.log(key, value[0]);
                        key = $('#' + key);
                        key.parent('div').addClass('has-error');
                        key.next('span').html(value[0]);
                        key.next('span').addClass('help-block');
                    });
                }
            })
        });
    });
}