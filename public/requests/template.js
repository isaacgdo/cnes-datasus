$(document).ready(function(){
    if (typeof Cookies.get('access_token') === 'undefined'){
        location.replace(url_base+'/login')
    } else {
        $.ajax({
            url: url_base + '/api/auth/user',
            method: 'GET',
            headers: {"Authorization" : "Bearer "+ Cookies.get('access_token')},
            success: function (response) {
                user = response;
                if(!(user.avatar === null)){
                    $("#user #profilePic img").attr("src",user.avatar);
                }
                $("#user li p").text(user.name)
            },
            error: function (e) {
                bootbox.alert("Você não está autorizado a ver essa página ou sua sessão expirou. Status: "+ e.status);
                console.error('server-side failure with status code ' + e.status);
                location.replace(url_base+'/login');
                Cookies.remove('access_token');
            }
        });
    }
});

$("#logout").click(function() {
    $.ajax({
        url: url_base + '/api/auth/logout',
        method: 'GET',
        headers: {"Authorization": "Bearer " + Cookies.get('access_token')},
        success: function (response) {
            Cookies.remove('access_token');
            location.replace(url_base+'/login');
        },
        error: function (e) {
            bootbox.alert("Não foi possível fazer o logout. Status: "+ e.status);
            console.error('server-side failure with status code ' + e.status);
        }
    });
});

$(".active-pro").click(function () {
    demo.showNotification('top','right', 1);
    $.ajax({
        url: url_base + '/api/scrap',
        method: 'GET',
        headers: {"Authorization": "Bearer " + Cookies.get('access_token')},
        success: function (response) {
            if(response.message === 'already-scrapped'){
                demo.showNotification('top','right', 0);
            } else{
                demo.showNotification('top','right', 2);
                setInterval(function(){
                    location.replace(url_base+'/professionals/list'); }, 1500);
            }
        },
        error: function (e) {
            demo.showNotification('top','right', 3);
            console.error('server-side failure with status code ' + e.status);
        }
    });
});