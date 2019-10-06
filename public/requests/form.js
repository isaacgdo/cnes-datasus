$(document).ready(function(){
    var url = window.location.href;
    if(url.includes('add')) {
        $.when(
            $.ajax({
                url: url_base + '/api/cbos',
                method: 'GET',
                headers: {"Authorization" : "Bearer "+ Cookies.get('access_token')}
            }),
            $.ajax({
                url: url_base + '/api/bonds',
                method: 'GET',
                headers: {"Authorization" : "Bearer "+ Cookies.get('access_token')},
            }),
            $.ajax({
                url: url_base + '/api/types',
                method: 'GET',
                headers: {"Authorization" : "Bearer "+ Cookies.get('access_token')},
            })
        ).then(function(response_cbo, response_bond, response_type) {
            $.each(response_cbo[0].data, function(ix, rp) {
                $('#cboControlSelect')
                    .append($("<option>")
                        .attr('value', rp.id)
                        .text(rp.code + ' - ' + rp.description)
                    )
            });
            $.each(response_bond[0].data, function(ix, rp) {
                $('#bondControlSelect')
                    .append($("<option>")
                        .attr('value', rp.id)
                        .text(rp.description)
                    )
            });
            $.each(response_type[0].data, function(ix, rp) {
                $('#typeControlSelect')
                    .append($("<option>")
                        .attr('value', rp.id)
                        .text(rp.description)
                    )
            });
        }).fail(function(err) {
            console.log('Não foi possível carregar os dados', err);
        });
    } else {
        var start = url.search("/edit/");
        var user = url.substr(start + 6);
        $.when(
            $.ajax({
                url: url_base + '/api/cbos',
                method: 'GET',
                headers: {"Authorization" : "Bearer "+ Cookies.get('access_token')}
            }),
            $.ajax({
                url: url_base + '/api/bonds',
                method: 'GET',
                headers: {"Authorization" : "Bearer "+ Cookies.get('access_token')},
            }),
            $.ajax({
                url: url_base + '/api/types',
                method: 'GET',
                headers: {"Authorization" : "Bearer "+ Cookies.get('access_token')},
            }),
            $.ajax({
                url: url_base + '/api/professionals/'+user,
                method: 'GET',
                headers: {"Authorization" : "Bearer "+ Cookies.get('access_token')},
            }),
        ).then(function(response_cbo, response_bond, response_type, response_user) {
            $.each(response_cbo[0].data, function(ix, rp) {
                $('#cboControlSelect')
                    .append($("<option>")
                        .attr('value', rp.id)
                        .text(rp.code + ' - ' + rp.description)
                    )
            });
            $.each(response_bond[0].data, function(ix, rp) {
                $('#bondControlSelect')
                    .append($("<option>")
                        .attr('value', rp.id)
                        .text(rp.description)
                    )
            });
            $.each(response_type[0].data, function(ix, rp) {
                $('#typeControlSelect')
                    .append($("<option>")
                        .attr('value', rp.id)
                        .text(rp.description)
                    )
            });
            var assignment_date = response_user[0].data.assignment_date;
            var new_assignment_date = '';
            if (assignment_date.search('-') === 4){
                new_assignment_date = assignment_date;
            } else {
                var day = assignment_date.substr(0,2);
                var month = assignment_date.substr(3,2);
                var year = assignment_date.substr(6,4);
                new_assignment_date = year+'-'+month+'-'+day;
            }


            $('.title').text('Editar Profissional');
            $('#addoreditProfessionalForm button').text('Editar');
            $("input[name='name']").val(response_user[0].data.name);
            $("input[name='cns']").val(response_user[0].data.cns);
            $("#assignment_dateSelect").val(new_assignment_date);
            $("input[name='workload']").val(response_user[0].data.workload);
            $("#susControlSelect").val(response_user[0].data.sus);
            $("#cboControlSelect").val(response_user[0].data.cbo.data.id);
            $("#bondControlSelect").val(response_user[0].data.bond.data.id);
            $("#typeControlSelect").val(response_user[0].data.type.data.id);
        }).fail(function(err) {
            console.log('Não foi possível carregar os dados', err);
        });
    }
});






var form = $('#addoreditProfessionalForm');
$(form).submit(function (e) {
    e.preventDefault();
    var formData = $(form).serialize();
    var url = window.location.href;

    if(url.includes('add')){
        $.ajax({
            url: url_base + '/api/professionals',
            data: formData,
            method: 'POST',
            headers: {"Authorization" : "Bearer "+ Cookies.get('access_token')},
            success: function (response, status, xhr) {
                bootbox.alert("Profissional cadastrado com suscesso");
                setInterval(function(){
                    location.replace(url_base+'/professionals/add'); }, 2000);
            },
            error: function (e) {
                bootbox.alert("Não foi possível realizar o cadastro. Status: "+ e.status);
                console.error('server-side failure with status code ' + e.status);
            }
        });
    } else {
        var start = url.search("/edit/");
        var user = url.substr(start+6);
        $.ajax({
            url: url_base + '/api/professionals/'+user,
            data: formData,
            method: 'PUT',
            headers: {"Authorization" : "Bearer "+ Cookies.get('access_token')},
            success: function (response, status, xhr) {
                bootbox.alert("Profissional editado com suscesso");
                setInterval(function(){
                    location.replace(url_base+'/professionals/edit/'+user); }, 2000);
            },
            error: function (e) {
                bootbox.alert("Não foi possível realizar a edição. Status: "+ e.status);
                console.error('server-side failure with status code ' + e.status);
            }
        });
    }
});