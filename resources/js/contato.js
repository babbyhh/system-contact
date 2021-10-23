$(document).ready(function(){

    $(document).on('click','#incluirContato', function (e){
        e.preventDefault();
        let url = $(this).attr('uri');
        console.log(url);
        $.get(url, function(data){
            $('#Contato').find('.modal-body').html(data);
            $('#Contato').modal('show');
            $('.modal-title').empty().append('Adicionar Contato');
            $('#enviarDados').removeClass('d-none');
            $('#contato').mask('00 000 00 00');
        });
    });

    $(document).on('click', '#enviarDados', function(e){
        e.preventDefault();
        let dados = $('#contatos').serialize();
        $.ajax({
            url : $('#contatos').attr('action'),
            method : 'post',
            data: dados,
            beforeSend: function () {
                mensg.mensg('Processando, aguarde!', 1, 0, 0, 0, 0);
            },
            success: function (data) {
                toastr.clear();
                
                mensg.mensg(data.msg, data.success);
                
                if (data.success == 1 || data.success == 3) {
                    location.reload();
                }
            }, 
            error: function (jqXHR, testStatus, error){
                let data ='';
                toastr.clear();
                if(jqXHR.responseJSON.errors) {
                    $.each(jqXHR.responseJSON.errors, function(index, value){
                        data = data  + value +'<br>';
                    });
                } else if( jqXHR.responseJSON.message) {
                    data =jqXHR.responseJSON.message;
                }
                mensg.mensg(data, 2);
            }
        });
    });

    $(document).on('click', '.edit', function(e){
        e.preventDefault();
        $.ajax({
            url : $(this).attr('href'),
            method : 'get',
           
            beforeSend: function () {
                mensg.mensg('Processando, aguarde!', 1, 0, 0, 0, 0);
            },
            success: function (data) {
                toastr.clear();
                
                $('#Contato').find('.modal-body').html(data);
                
                $('#Contato').modal('show');
                $('#enviarDados').removeClass('d-none');
                $('.modal-title').empty().append('Editar Contato');
                $('#contato').mask('00 000 00 00');
            }, 
            error: function (jqXHR, testStatus, error){
                let data ='';
                toastr.clear();
                $.each(jqXHR.responseJSON.errors, function(index, value){
                    data = data  + value +'<br>';
                });
                mensg.mensg(data, 2);
            }
        });
    });

    $(document).on('click', '.excluir', function(e){
        e.preventDefault();
        $.ajax({
            url : $(this).attr('href'),
            method : 'post',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                mensg.mensg('Processando, aguarde!', 1, 0, 0, 0, 0);
            },
            success: function (data) {
                toastr.clear();
                mensg.mensg(data.msg, data.success);
                location.reload()
                if (data.success == 1) {
                   
                }
            }, 
            error: function (jqXHR, testStatus, error){
                let data ='';
                toastr.clear();
                $.each(jqXHR.responseJSON.errors, function(index, value){
                    data = data  + value +'<br>';
                });
                mensg.mensg(data, 2);
            }
        });
    });

    $(document).on('click', '.detalhes', function(e){
        e.preventDefault();
        $.ajax({
            url : $(this).attr('href'),
            method : 'get',
           
            beforeSend: function () {
                mensg.mensg('Processando, aguarde!', 1, 0, 0, 0, 0);
            },
            success: function (data) {
                toastr.clear();
                
                $('#Contato').find('.modal-body').html(data);
                $('.modal-title').empty().append('Detalhes Contato');
                $('#enviarDados').addClass('d-none');
                $('#Contato').modal('show');
            }, 
            error: function (jqXHR, testStatus, error){
                let data ='';
                toastr.clear();
                $.each(jqXHR.responseJSON.errors, function(index, value){
                    data = data  + value +'<br>';
                });
                mensg.mensg(data, 2);
            }
        });
    });

});