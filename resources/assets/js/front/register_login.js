$(function () {
    $('#reg-click').click(function (e) {
        $('#log-click').removeClass('active');
        $('#reg-click').addClass('active');
    });
    $('#log-click').click(function (e) {
        $('#reg-click').removeClass('active');
        $('#log-click').addClass('active');
    });

    /*
    * Register Form Request
    * */
    let registerForm = $('#registerForm');

    let errorMessage = '<div class="alert alert-danger" id="message">' +
        '<strong>Error Encounter!</strong> ' +
        'You should check in on some of those fields below.' +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<span aria-hidden="true">&times;</span>' +
        '</button>' +
        '</div>';

    let successMessage = '<div class="alert alert-success" id="message">' +
        '<strong>Register Sucessfull!</strong> ' +
        'Please Check Your Email For the Validation Link.' +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<span aria-hidden="true">&times;</span>' +
        '</button>' +
        '</div>';


    registerForm.submit(function (e) {
        let width = $('#form-section').width();
        let data = registerForm.serialize();
        e.preventDefault();
        removeErrors(registerForm);
        $.ajax({
            url: '/register',
            type: 'post',
            data: data,
            datatye: 'json',
            success: function (response) {

                $('#message').html(successMessage);
                $(':input', registerForm)
                    .not(':button, :submit, :reset, :hidden')
                    .val('')
            },
            error: function (errors) {
                $('#message').html(errorMessage);
                $.each(errors.responseJSON.errors, function (key, value) {
                    key = $('#' + key);
                    key.parent('div').addClass('has-error');
                    key.next('span').html(value[0]);
                    key.next('span').addClass('help-block');
                });
            }
        });
    });

    /*
    * Login Form Request
    * */

    let loginForm = $('#loginForm');
    loginForm.submit(function (e) {
        e.preventDefault();
        removeErrors(loginForm);
        let loginData = loginForm.serialize();
        $.ajax({
            url: '/login',
            type: 'post',
            data: loginData,
            datatye: 'json',
            success: function (response) {
                window.location.href = response['redirect'];
            },
            error: function (errors) {
                $.each($.parseJSON(errors.responseText), function (key, value) {
                    key = $('#log-' + key);
                    key.parent('div').addClass('has-error');
                    key.next('span').html(value);
                    key.next('span').addClass('help-block');

                });

                $('#message').html(errorMessage);
            }
        });
    });

    function removeErrors(input) {
        input.find('div').removeClass('has-error');
        input.find('span').html('');
        input.find('span').removeClass('help-block');
        $('#message').html('');
    }

});
