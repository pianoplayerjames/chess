$(document).on('keyup', '#signin_username', function(event) {
    if (event.which == 13) {
        sign_in();
    }
});

$(document).on('keyup', '#signin_password', function(event) {
    if (event.which == 13) {
        $('#signin_button').attr('disabled', true).html('Checking details..');
        sign_in();
    }
});


$(document).on('click', '#signin_button', function(event) {
    console.log('check');
    $('#signin_button').attr('disabled', true).html('Checking details..');
    sign_in();
});

function sign_in() {

    var signin_username = $('#signin_username').val();
    var signin_password = $('#signin_password').val();

    $.ajax({
        type: 'POST',
        data: 'username=' + signin_username + '&password=' + signin_password,
        url: 'widgets/signin/ajax/signin_ajax.php',
        success: function(data) {
            console.log(data);
            if (data == 'username_empty') {
                $('#signin_error').removeClass('d-none').html("<i class='fas fa-user'></i> Username Empty");
                $('#signin_button').attr('disabled', false).html('Sign In');
            } else if (data == 'password_empty') {
                $('#signin_error').removeClass('d-none').html("<i class='fas fa-user'></i> Password Empty");
                $('#signin_button').attr('disabled', false).html('Sign In');
            } else if (data == 'user_incorrect') {
                $('#signin_error').removeClass('d-none').html("<i class='fas fa-user'></i> Username or password incorrect");
                $('#signin_button').attr('disabled', false).html('Sign In');
            } else if (data == 'success') {
                load('', 1);
                refresh_ui();
            } else if (data == 'timed_out') {
                $('#signin_error').removeClass('d-none').html("<i class='fas fa-user'></i> You've been timed out for entering the incorrect username and/or password too many times. Please try again in 5 minutes. Sorry! :(");
                $('#signin_button').attr('disabled', false).html('Sign In');
            }
        }
    });
}

$(document).on('click', '#lichess_connect', function(event) {
    $.ajax({
        url: url + 'widgets/signin/ajax/lichess/auth.php',
        success: function(data) {
            window.location = data;
        }
    });
});

function lichessAuth(code) {
    $.ajax({
        type: 'POST',
        url: url + 'widgets/signin/ajax/lichess/token.php',
        data: 'code=' + code,
        success: function(data) {
            load('', 1);
            refresh_ui();
        }
    });
}