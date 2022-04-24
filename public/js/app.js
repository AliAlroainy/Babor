// initialize validation messages variable
$.validation = {
    messages: {}
};

// add validation templates to show fancy icons with message text
$.extend($.validation.messages, {
    required: '<i class="fa fa-exclamation-circle"></i> required.',
    email: '<i class="fa fa-exclamation-circle"></i> Please enter a valid email.',
});

// call our 'validateLoginForm' function when page is ready
$(document).ready(function () {
    validateLoginForm();
});

// bind jQuery validation event and form 'submit' event
var validateLoginForm = function () {
    var modal_login = $('#modal_login');
    var modal_form_login = $('#modal_form_login');
    var login_result = $('#login_result');

    // bind jQuery validation event
    modal_form_login.validate({
        rules: {
            modal_login_email: {
                required: true,     // email field is required
                email: true         // validate email address
            },
            modal_login_password: {
                required: true      // password field is required
            }
        },
        messages: {
            modal_login_email: {
                required: $.validation.messages.required,
                email: $.validation.messages.email
            },
            modal_login_password: {
                required: $.validation.messages.required
            }
        },
        errorPlacement: function (error, element) {
            // insert error message after invalid element
            error.insertAfter(element);

            // hide error message on window resize event
            $(window).resize(function () {
                error.remove();
            });
        },
        invalidHandler: function (event, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {
            } else {
            }
        }
    });

    var modal_login_email = $('#modal_login_email');
    var modal_login_password = $('#modal_login_password');
    var modal_login_remember = $('#modal_login_remember');

    // bind form submit event
    modal_form_login.on('submit', function (e) {
        var remember = modal_login_remember.is(':checked') ? 1 : 0;

        // if form is valid then call AJAX script
        if (modal_form_login.valid()) {
            var ajaxRequest = $.ajax({
                url: 'ajax/login.php',
                type: "POST",
                data: {
                    email: modal_login_email.val(),
                    password: modal_login_password.val(),
                    remember: remember
                },
                beforeSend: function () {
                }
            });

            ajaxRequest.fail(function (data, status, errorThrown) {
                // error
                var $message = data.responseText;
                login_result.html('<div class="alert alert-danger">' + $message + '</div>');
                modal_login.modal('hide');
            });

            ajaxRequest.done(function (response) {
                // done
                var $response = $.parseJSON(response);
                login_result.html('<div class="alert alert-success">' + $response.message + '</div>');
                modal_login.modal('hide');
            });
        }

        // stop default submit event of form
        e.preventDefault();
        e.stopPropagation();
    });

    modal_login.on('hide.bs.modal', function (e) {
        // reset form fields and validation errors
        modal_form_login.validate().resetForm();
        modal_form_login.trigger('reset');
    });
}