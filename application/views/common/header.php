<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Recursos Humanos - Harmonia Benefícios">
        <meta name="author" content="Ufirst">
        <link rel="icon" href="../../../../favicon.ico">
        <title>RH - Harmonia</title>
        <link href="<?=base_url('css/bootstrap.min.css')?>" rel="stylesheet">
        <link href="<?=base_url('css/mdb.min.css')?>" rel="stylesheet">
        <link href="<?=base_url('css/toastr.min.css')?>" rel="stylesheet">
        <link href="<?=base_url('css/all.min.css')?>" rel="stylesheet">
        <link href="<?=base_url('css/style.css')?>" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark elegant-color">
            <a class="navbar-brand" href="#">RH - Harmonia Benefícios</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item <?=$controller == 'empresas' ? 'active' : ''?>">
                        <a class="nav-link" href="<?=base_url('empresas')?>">Empresas</a>
                    </li>
                    <li class="nav-item <?=$controller == 'funcionarios' ? 'active' : ''?>">
                        <a class="nav-link" href="<?=base_url('funcionarios')?>">Funcionários</a>
                    </li>
                </ul>
            </div>
        </nav>
