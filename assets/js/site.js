url = 'http://localhost/';

var full_url = window.location.pathname;
var path = full_url.split("/");

$(function() {
    refresh_ui();
    if (path[1] == '') {
        load('lobby', 0);
    } else {
        load(path[1], 0);
    }
});

function refresh_ui() {
    $('#header').load(url + 'inc/ui/header.php');
}

window.addEventListener('popstate', function(e) {
    var full_url = window.location.pathname;
    var path = full_url.split("/");
    load(path[1]);
});

$(document).on('click', '[data-page]', function(event) {
    var page = $(this).data('page');
    load(page, 1);
});

function load(page, state) {

    var page_split = page.split("/");

    if (state == 1) {
        if (page_split[0] == '') {
            history.pushState(null, null, '/');
        } else {
            history.pushState(null, null, '/' + page);
        }
    }

    var urlSearchParams = new URLSearchParams(window.location.search);
    var params = Object.fromEntries(urlSearchParams.entries());
    var full_url = window.location.pathname;
    var path = full_url.split("/");

    $.ajax({
        type: 'GET',
        url: url + 'inc/url_check.php',
        data: 'page=' + page_split[0],
        success: function(data) {

            if (data == 'valid') {
                page_url = 'widgets/' + page_split[0] + '/index.php';
            } else if (data == 'profile') {
                page_url = 'widgets/profile/index.php?user=' + page_split[0];
            } else if (data == 'lobby') {
                page_url = 'widgets/lobby/index.php';
            } else {
                page_url = 'widgets/error/index.php';
            }

            $.ajax({
                url: url + page_url,
                data: { params, path },
                success: function(data) {
                    $('#page').html(data);
                }
            });
        }
    });
}

var delay;

$(document).on('keyup', '#register_username', function(event) {

    clearTimeout(delay);

    delay = setTimeout(function() {

        check_register();
        var username_check = $('#register_username').val();

        if (username_check.length >= 1) {

            $.ajax({
                type: 'POST',
                data: 'username=' + username_check,
                url: 'widgets/register/ajax/username_check.php',
                success: function(data) {
                    if (username_check == '') {
                        $('#username_check').html('');
                        $('#username_check_message').html('');
                    } else if (data == 'available') {
                        $('#username_check').html('<i class="fas fa-check-circle text-success"></i>');
                        $('#username_check_message').html('username Available');
                    } else {
                        $('#username_check').html('<i class="fas fa-times-circle text-danger"></i>');
                        $('#username_check_message').html('Username Taken');
                    }
                }
            });
        }

    }, 700);
});


$(document).on('keyup', '#register_password', function(event) {

    check_register();
    var register_password = $('#register_password').val();
    var desc = [{ 'width': '0px' }, { 'width': '20%' }, { 'width': '40%' }, { 'width': '60%' }, { 'width': '80%' }, { 'width': '100%' }];
    var descClass = ['', 'bg-danger', 'bg-danger', 'bg-warning', 'bg-success', 'bg-success'];
    var score = 0;
    if (register_password.length == 0) { score = 0; }
    if (register_password.length >= 5) { score++; }
    if ((register_password.match(/[a-z]/)) && (register_password.match(/[A-Z]/))) { score++; }
    if (register_password.match(/\d+/)) { score++; }
    if (register_password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) { score++; }
    if (register_password.length >= 10) { score++; }
    $('#register_password_strength').removeClass(descClass[score - 1]).addClass(descClass[score]).css(desc[score]);

});

$(document).on('keyup', '#register_email', function(event) {

    clearTimeout(delay);

    delay = setTimeout(function() {

        check_register();
        var email_check = $('#register_email').val();

        if (email_check.length >= 1) {

            $.ajax({
                type: 'POST',
                data: 'email=' + email_check,
                url: 'widgets/register/ajax/email_check.php',
                success: function(data) {
                    if (email_check == '') {
                        $('#email_check').html('');
                        $('#email_check_message').html('');
                    } else if (data == 'available') {
                        $('#email_check').html('<i class="fas fa-check-circle text-success"></i>');
                        $('#email_check_message').html('Email Address Available');
                    } else if (data == 'invalid') {
                        $('#email_check').html('<i class="fas fa-times-circle text-danger"></i>');
                        $('#email_check_message').html('Email Address Invalid');
                    } else {
                        $('#email_check').html('<i class="fas fa-times-circle text-danger"></i>');
                        $('#email_check_message').html('Email Address already in use');
                    }
                }
            });
        }

    }, 700);
});

function check_register() {

    var username_form = $('#register_username').val();
    var password_form = $('#register_password').val();
    var email_form = $('#register_email').val();

    if (username_form.length > 0 && password_form.length > 0 && email_form.length > 0) {
        $('#register_button').removeAttr('disabled');
    } else {
        $('#register_button').attr('disabled', true);
    }
}

$(document).on('click', '#register_button', function(event) {
    var register_username = $('#register_username').val();
    var register_password = $('#register_password').val();
    var register_email = $('#register_email').val();

    $.ajax({
        type: 'POST',
        data: 'username=' + register_username + '&password=' + register_password + '&email=' + register_email,
        url: 'widgets/register/ajax/register_ajax.php',
        success: function(data) {
            if (data == 'username_empty') {
                $('#register_error').removeClass('d-none').html("<i class='fas fa-user'></i> Username Empty");
            } else if (data == 'password_empty') {
                $('#register_error').removeClass('d-none').html("<i class='fas fa-key'></i> Password Empty");
            } else if (data == 'email_empty') {
                $('#register_error').removeClass('d-none').html("<i class='fas fa-envelope-open'></i> Email Address Empty");
            } else if (data == 'invalid_username') {
                $('#register_error').removeClass('d-none').html("<i class='fas fa-user'></i> Invalid Username");
            } else if (data == 'username_taken') {
                $('#register_error').removeClass('d-none').html("<i class='fas fa-user-minus'></i> Username Taken");
            } else if (data == 'username_too_long') {
                $('#register_error').removeClass('d-none').html("<i class='fas fa-user-alt-slash'></i> Username too long");
            } else if (data == 'password_too_short') {
                $('#register_error').removeClass('d-none').html("<i class='fas fa-key'></i> Password too short");
            } else if (data == 'password_too_long') {
                $('#register_error').removeClass('d-none').html("<i class='fas fa-key'></i> Password too long");
            } else if (data == 'invalid_email') {
                $('#register_error').removeClass('d-none').html("<i class='fas fa-at'></i> Email Address invalid");
            } else if (data == 'email_taken') {
                $('#register_error').removeClass('d-none').html("<i class='fas fa-paper-plane'></i> Email Address already in use");
            } else if (data == 'success') {
                load('intro', 1);
                refresh_ui();
            }
        }
    });
});

$(document).on('click', '#account_sign_out', function(event) {
    $.ajax({
        url: 'widgets/account/ajax/signout_ajax.php',
        success: function(data) {
            load('', 1);
            refresh_ui();
        }
    });
});