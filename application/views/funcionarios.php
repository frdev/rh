<?php require_once APPPATH.'views/common/header.php'?>
<div class="container" data-controller="funcionarios">
    <form class="card mt-3" method="GET" action="">
        <div class="card-header elegant-color text-white font-weight-bold"><i class="fas fa-filter"></i> FILTRO</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold">Tipo do Filtro</label>
                        <select name="tipo" class="form-control form-control-sm" required>
                            <option value="">Selecione...</option>
                            <option value="empresa"  <?=!empty($filtros) && $filtros['tipo'] == 'empresa' ? 'selected' : ''?>>Empresa - Nome Fantasia</option>
                            <option value="nome"     <?=!empty($filtros) && $filtros['tipo'] == 'nome'    ? 'selected' : ''?>>Nome</option>
                            <option value="cpf"      <?=!empty($filtros) && $filtros['tipo'] == 'cpf'     ? 'selected' : ''?>>CPF</option>
                            <option value="rg"       <?=!empty($filtros) && $filtros['tipo'] == 'rg'      ? 'selected' : ''?>>RG</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold">Filtro</label>
                        <input type="text" name="filtro" class="form-control form-control-sm" value="<?=!empty($filtros) && $filtros['filtro'] ? $filtros['filtro'] : ''?>" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form">
                        <button type="submit" class="btn btn-sm btn-default">PESQUISAR</button>
                        <a href="<?=base_url('funcionarios')?>" class="btn btn-sm elegant-color">LIMPAR FILTRO</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="card mt-3">
        <div class="card-header elegant-color text-white font-weight-bold"><i class="fas fa-user"></i> FUNCIONÁRIOS</div>
        <div class="card-body">
            <div class="novo float-right mt-2">
                <a href="<?=base_url('funcionarios/exportar')?>" class="btn btn-sm elegant-color" target="_blank">Exportar FUNCIONÁRIOS</a>
                <button class="btn btn-sm default-color" data-toggle="modal" data-target="#modal">Adicionar FUNCIONÁRIO</button>
            </div>
            <div class="editar float-right mt-2 d-none">
                <a href="<?=base_url('funcionarios/exportar')?>" class="btn btn-sm elegant-color" target="_blank">Exportar FUNCIONÁRIOS</a>
                <button class="btn btn-sm elegant-color btn-limpar-selecao">Limpar Seleção</button>
                <button class="btn btn-sm danger-color btn-deletar">Deletar</button>
                <button class="btn btn-sm default-color btn-editar" data-toggle="modal" data-target="#modal">Editar</button>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-borderless">
                <thead>
                    <tr class="text-center">
                        <th scope="col" class="font-weight-bold">Nome</th>
                        <th scope="col" class="font-weight-bold">Função</th>                        
                        <th scope="col" class="font-weight-bold">Empresa</th>
                        <th scope="col" class="font-weight-bold">CPF</th>
                        <th scope="col" class="font-weight-bold">RG</th>
                        <th scope="col" class="font-weight-bold">Salário</th>
                        <th scope="col" class="font-weight-bold">Status</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($funcionarios)) : ?>
                        <?php foreach($funcionarios as $funcionario) : ?>
                            <tr class="text-center item-select" data-id="<?=$funcionario['id']?>">
                                <td><?=$funcionario['nome']?></td>
                                <td><?=$funcionario['funcao']?></td>
                                <td><?=$funcionario['empresa']?></td>
                                <td><?=$funcionario['cpf']?></td>
                                <td><?=$funcionario['rg']?></td>
                                <td><?=toReal($funcionario['salario'])?></td>
                                <td><?=!empty($funcionario['demissao']) && $funcionario['demissao'] != '0000-00-00' ? 'Desligado' : 'Ativo'?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7"><div class="alert alert-info font-weight-bold text-center">Não existem funcionarios cadastradas</div></td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
        <?php if(!empty($links)) : ?>
            <div class="card-footer">
                <?=$links?>
            </div>
        <?php endif ?>
    </div>
</div>
<?php require_once APPPATH.'views/modals/funcionarios/cadastro.php'?>
<?php require_once APPPATH.'views/common/footer.php'?>
