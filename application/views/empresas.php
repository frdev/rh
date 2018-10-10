<?php require_once APPPATH.'views/common/header.php'?>
<div class="container" data-controller="empresas">
    <form class="card mt-3" method="GET" action="">
        <div class="card-header elegant-color text-white font-weight-bold"><i class="fas fa-filter"></i> FILTRO</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold">Tipo do Filtro</label>
                        <select name="tipo" class="form-control form-control-sm" required>
                            <option value="">Selecione...</option>
                            <option value="rsocial"  <?=!empty($filtros) && $filtros['tipo'] == 'rsocial'  ? 'selected' : ''?>>Razão Social</option>
                            <option value="fantasia" <?=!empty($filtros) && $filtros['tipo'] == 'fantasia' ? 'selected' : ''?>>Nome Fantasia</option>
                            <option value="cnpj"     <?=!empty($filtros) && $filtros['tipo'] == 'cnpj'     ? 'selected' : ''?>>CNPJ</option>
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
                        <a href="<?=base_url('empresas')?>" class="btn btn-sm elegant-color">LIMPAR FILTRO</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="card mt-3">
        <div class="card-header elegant-color text-white font-weight-bold"><i class="fas fa-industry"></i> EMPRESAS</div>
        <div class="card-body">
            <div class="novo float-right mt-2">
                <button class="btn btn-sm default-color" data-toggle="modal" data-target="#modal">Adicionar EMPRESA</button>
            </div>
            <div class="editar float-right mt-2 d-none">
                <button class="btn btn-sm elegant-color btn-limpar-selecao">Limpar Seleção</button>
                <button class="btn btn-sm danger-color btn-deletar">Deletar</button>
                <button class="btn btn-sm default-color btn-editar" data-toggle="modal" data-target="#modal">Editar EMPRESA</button>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-borderless">
                <thead>
                    <tr class="text-center">
                        <th scope="col" class="font-weight-bold">Razão Social</th>
                        <th scope="col" class="font-weight-bold">Nome Fantasia</th>
                        <th scope="col" class="font-weight-bold">CNPJ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($empresas)) : ?>
                        <?php foreach($empresas as $empresa) : ?>
                            <tr class="text-center item-select" data-id="<?=$empresa['id']?>">
                                <td><?=$empresa['rsocial']?></td>
                                <td><?=$empresa['fantasia']?></td>
                                <td><?=$empresa['cnpj']?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="3"><div class="alert alert-info font-weight-bold text-center">Não existem empresas cadastradas</div></td>
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
<?php require_once APPPATH.'views/modals/empresas/cadastro.php'?>
<?php require_once APPPATH.'views/common/footer.php'?>
