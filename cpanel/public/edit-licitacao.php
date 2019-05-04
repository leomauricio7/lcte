<?php if (Validation::verificaPermisao($tipoUser, $url)) { ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">Início</li>
            <li class="breadcrumb-item active" aria-current="page">Editar Licitações</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edição - Licitação: 
            <?php
            $tipoEdital = ucwords(str_replace("-", " ", Url::getURL(1)));
            echo $tipoEdital;
            ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <?php if (Validation::verificaPermisao($tipoUser, 'licitacoes')) { ?>
                <div class="btn-group mr-2">
                    <a class=" btn btn-sm btn-dark" href="<?php echo Url::getBase() . 'licitacoes'; ?>"><i class="fa fa-list"></i> Listar Licitações</a>
                </div>
            <?php } ?>
        </div>
    </div>
<?php 
    if(Validation::verificaUrl(Url::getURL(1))){
        if(Validation::verificaForm(Url::getURL(1))){
            require_once 'forms/form-edit-1.php';
        }else{
            require_once 'forms/form-edit-2.php';
        }
    }else{
        require_once('404.php');
    }
} else {
    require_once('403.php');
}