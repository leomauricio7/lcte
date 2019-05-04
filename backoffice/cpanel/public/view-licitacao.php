<?php if (Validation::verificaPermisao($tipoUser, $url)) { ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">Início</li>
            <li class="breadcrumb-item active" aria-current="page">Licitações</li>
        </ol>
    </nav>
    <?php
    if (!empty($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;
    ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detalhes da licitação</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <?php if (Validation::verificaPermisao($tipoUser, 'cadastra-licitacao')) { ?>
                <div class="btn-group mr-2">
                    <div class="btn-group">
                        <div class="btn-group dropleft" role="group">
                            <button type="button" class="btn btn-sm btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropleft</span>
                            </button>
                            <div class="dropdown-menu">
                                <?php
                                $read = new Read();
                                $read->ExeRead("edital_tipo");
                                foreach ($read->getResult() as $dados) {
                                    extract($dados);
                                    ?>
                                    <a class="dropdown-item" href="<?php echo Url::getBase() . 'cadastra-licitacao/' . $pasta; ?>"><?php echo utf8_encode($tipo); ?></a>

                                <?php } ?>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-dark">
                            Nova Licitação
                        </button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php
    $idEdital = Url::getURL(2);
    if(Validation::verificaUrl(Url::getURL(1))){
        if(Validation::verificaForm(Url::getURL(1))){
            require_once 'forms/view-1.php';
        }else{
            require_once 'forms/view-2.php';
        }
    }else{
        require_once('404.php');
    }
} else {
    require_once('403.php');
}