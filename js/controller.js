// Inicializa as funções das controller
runApp.controller = {
    login:function(){
        $('#formSignIn').submit(function(e){
            e.preventDefault();
            var dados = $(this).serialize();
            $.post(base_url + 'login/signin', dados, function(data){
                if(data){
                    toastr.success('Login realizado');
                    setTimeout(function(){
                        window.location.href = base_url + 'funcionarios';
                    }, 2000);
                } else {
                    toastr.error('Falha ao realizar login.');
                }
            });
        }); 
    },
    empresas:function(){
        $('#formEmpresa').submit(function(e){
            e.preventDefault();
            var dados = $(this).serialize();
            toastr.info('Atualizando...');
            $.post(base_url + 'empresas/save', dados, function(data){
                var result = JSON.parse(data);
                if(result.sucesso){
                    toastr.success(result.mensagem);
                    setTimeout(function(){
                        window.location.reload();
                    }, 2000);
                } else {
                    toastr.error(result.mensagem);
                }
            });
        });
        $('.btn-editar').on('click', function(){
            var id = $('.item-select.active').data('id');
            $('input[name="id"]').val(id);
            $.post(base_url + 'empresas/getEmpresa', {id: id}, function(data){
                var result = JSON.parse(data);
                $('.modal-title').html('Editar Empresa');
                $('input[name="rsocial"]').val(result.rsocial);
                $('input[name="fantasia"]').val(result.fantasia);
                $('input[name="cnpj"]').val(result.cnpj);
            });
        });
        $('.btn-novo').on('click', function(){
            $('input[name="id"]').val('');
            $('.modal-title').html('Adicionar Empresa');
        });
        $('.item-select').on('click', function(){
            $('.item-select').removeClass('active');
            $(this).addClass('active');
            $('.novo').addClass('d-none');
            $('.editar').removeClass('d-none');
        });
        $('.btn-limpar-selecao').on('click', function(){
            $('.item-select').removeClass('active');
            $('.novo').removeClass('d-none');
            $('.editar').addClass('d-none');
        });
        $('.btn-deletar').on('click', function(){
            var r = confirm('Deseja realmente deletar a empresa e seus funcionários a ela vinculados?');
            if(r == true){
                var id = $('.item-select.active').data('id');
                $.post(base_url + 'empresas/deletar', {id: id}, function(data){
                    toastr.success('Empresa deletada com sucesso.');
                    setTimeout(function(){
                        window.location.reload();
                    }, 1500);    
                });
            }
        });
    },
    funcionarios:function(){
        $('#formFuncionario').submit(function(e){
            e.preventDefault();
            var dados = $(this).serialize();
            toastr.info('Atualizando...');
            $.post(base_url + 'funcionarios/save', dados, function(data){
                var result = JSON.parse(data);
                if(result.sucesso){
                    toastr.success(result.mensagem);
                    setTimeout(function(){
                        window.location.reload();
                    }, 2000);
                } else {
                    toastr.error(result.mensagem);
                }
            });
        });
        $('.btn-deletar').on('click', function(){
            var r = confirm('Deseja realmente deletar o funcionário e seus registros?');
            if(r == true){
                var id = $('.item-select.active').data('id');
                $.post(base_url + 'funcionarios/deletar', {id: id}, function(data){
                    toastr.success('Funcionário deletado com sucesso.');
                    setTimeout(function(){
                        window.location.reload();
                    }, 1500);    
                });
            }
        });
        $('.btn-editar').on('click', function(){
            var id = $('.item-select.active').data('id');
            $('input[name="id"]').val(id);
            $.post(base_url + 'funcionarios/getFuncionario', {id: id}, function(data){
                var result = JSON.parse(data);
                $('.modal-title').html('Editar Funcionário');
                $('input[name="nome"]').val(result.nome);
                $('input[name="cpf"]').val(result.cpf);
                $('input[name="rg"]').val(result.rg);
                $('input[name="email"]').val(result.email);
                $('input[name="celular"]').val(result.celular);
                $('input[name="residencia"]').val(result.residencia);
                $('input[name="logradouro"]').val(result.logradouro);
                $('input[name="numero"]').val(result.numero);
                $('input[name="complemento"]').val(result.complemento);
                $('input[name="cep"]').val(result.cep);
                $('input[name="cidade"]').val(result.cidade);
                $('input[name="estado"]').val(result.estado);
                $('select[name="empresa_id"]').val(result.empresa_id);
                $('input[name="funcao"]').val(result.funcao);
                $('input[name="salario"]').val(result.salario);
                $('input[name="vr"]').val(result.vr);
                $('input[name="vt"]').val(result.vt);
                $('input[name="admissao"]').val(result.admissao);
                $('input[name="demissao"]').val(result.demissao);
                if(result.sexo == '0'){
                    $('input#feminino').attr('checked', false);
                    $('input#masculino').attr('checked', true);
                } else {
                    $('input#masculino').attr('checked', false);
                    $('input#feminino').attr('checked', true);
                }
            });
        });
        $('.btn-novo').on('click', function(){
            $('input[name="id"]').val('');
            $('.modal-title').html('Adicionar Funcionário');
        });
        $('.item-select').on('click', function(){
            $('.item-select').removeClass('active');
            $(this).addClass('active');
            $('.novo').addClass('d-none');
            $('.editar').removeClass('d-none');
        });
        $('.btn-limpar-selecao').on('click', function(){
            $('.item-select').removeClass('active');
            $('.novo').removeClass('d-none');
            $('.editar').addClass('d-none');
        });
    }
};