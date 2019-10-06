$(document).ready(function(){
    $('#professionals-list').DataTable();
    $('#professionals-list_wrapper .row').css("padding", "0px 15px");
    $('#professionals-list_wrapper .row').contents().eq(0).hide();
    $('#professionals-list_wrapper .row').contents().eq(3).hide();
    $('.dataTables_paginate').hide();
    $('.dataTables_empty').text('Carregando informações...');
    $('#professionals-list_filter').hide();

    $.ajax({
        url: url_base + '/api/professionals',
        method: 'GET',
        headers: {"Authorization" : "Bearer "+ Cookies.get('access_token')},
        success: function (response, status, xhr) {
            $('.dataTables_empty').hide();
            $.each(response.data, function(ix, rp) {
                $(".professionals-tbody")
                    .append($("<tr>")
                        .append($("<td>").text(rp.name))
                        .append($("<td>").text(rp.cns))
                        .append($("<td>").text(rp.assignment_date))
                        .append($("<td>").text(rp.cbo.data.code + ' - ' + rp.cbo.data.description))
                        .append($("<td>").text(rp.workload))
                        .append($("<td>").text(rp.sus))
                        .append($("<td>").text(rp.bond.data.description))
                        .append($("<td>").text(rp.type.data.description))
                        .append($("<td>")
                            .append($("<a class='edit-professional'>")
                                .attr('href', url_base+'/professionals/edit/'+rp.id)
                                .append($("<i class='fa fa-edit fa-2x'> "))
                            )
                            .append($("<a class='remove-professional'>")
                                .append($("<i class='fa fa-remove fa-2x'>"))
                                .click(function () {
                                    $.ajax({
                                        url: url_base + '/api/professionals/'+rp.id,
                                        method: 'DELETE',
                                        headers: {"Authorization" : "Bearer "+ Cookies.get('access_token')},
                                        success: function (response, status, xhr) {
                                            bootbox.alert("Profissional deletado com suscesso");
                                            setInterval(function(){
                                                location.replace(url_base+'/professionals/list'); }, 2000);
                                        },
                                        error: function (e) {
                                            bootbox.alert("Não foi possível realizar a deleção. Status: "+ e.status);
                                            console.error('server-side failure with status code ' + e.status);
                                        }
                                    });
                                })
                            )
                        )
                    )
            })
        },
        error: function (e) {
            console.error('server-side failure with status code ' + e.status);
            console.error("Não foi possível carregar os dados");
        }
    });
});

$(".delete-professionals").click(function () {
    $.ajax({
        url: url_base + '/api/professionals',
        method: 'DELETE',
        headers: {"Authorization" : "Bearer "+ Cookies.get('access_token')},
        success: function (response, status, xhr) {
            bootbox.alert("Profissionais deletados com suscesso");
            setInterval(function(){
                location.replace(url_base+'/professionals/list'); }, 2000);
        },
        error: function (e) {
            bootbox.alert("Não foi possível realizar a ação. Status: "+ e.status);
            console.error('server-side failure with status code ' + e.status);
        }
    });
});
