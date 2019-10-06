$(document).ready(function(){
    if (!typeof Cookies.get('access_token') === 'undefined'){
        location.replace(url_base+'/professionals/list');
    }
});

var form = $('#signupForm');
$(form).submit(function (e) {
    e.preventDefault();
    var formData = $(form).serialize();

    $.ajax({
        url: url_base + '/api/auth/signup',
        data: formData,
        method: 'POST',
        success: function (response, status, xhr) {
            location.replace(url_base+'/professionals/list')
        },
        error: function (e) {
            console.log(url_base)
            bootbox.alert("Não foi possível realizar o cadastro. Erro interno no servidor. Status: "+ e.status);
            console.error('server-side failure with status code ' + e.status);
            console.error("Não foi possível realizar o cadastro");
        }
    });
});