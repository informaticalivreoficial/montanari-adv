$(function(){
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('form[name="login"]').submit(function (event) {
        event.preventDefault();

        const form = $(this);
        const action = form.attr('action');
        const email = form.find('input[name="email"]').val();
        const remember_me = form.find('input[name="remember_me"]').val();
        const password = form.find('input[name="password_check"]').val();

        $.post(action, {email: email, password: password, remember_me: remember_me}, function (response) {

            if(response.message) {
                toastr.error(response.message);
            }

            if(response.redirect) {
                toastr.success(response.msg);
                setTimeout(function() {
                    window.location.href = response.redirect;
                }, 2000);                                
            }
        }, 'json');

    });
    
});
