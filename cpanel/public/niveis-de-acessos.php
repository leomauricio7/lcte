<?php if(Validation::verificaPermisao($tipoUser, $url)){ ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page">Início</li>
        <li class="breadcrumb-item active" aria-current="page">Niveis de Acesso</li>
    </ol>
</nav>
<?php
    if (!empty($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Niveis de Acessos Cadastrados</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <?php if(Validation::verificaPermisao($tipoUser, 'cadastra-nivel-de-acesso')){ ?>
        <div class="btn-group mr-2">
            <a class=" btn btn-sm btn-dark" href="<?php echo Url::getBase() . 'cadastra-nivel-de-acesso'; ?>"><i class="fa fa-plus-circle"></i> Cadastrar Nivel de Acesso</a>
        </div>
        <?php } ?>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nivel de Acesso</th>
                <th>Ordem de Acesso</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $read = new REad();
            $read->ExeRead("user_tipo", "ORDER BY ordem ASC");
            foreach ($read->getResult() as $dados) {
                extract($dados);
                ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $tipo; ?></td>
                    <td><?php echo $ordem; ?></td>
                    <td>
                        <?php if(Validation::verificaPermisao($tipoUser, 'altera-ordem')){ ?>
                        <a href="<?php echo Url::getBase() . './app/Class/updateOrdemdeAcesso.php?ordem='.$ordem; ?>" title="Alterar a ordem do nivel de acesso" class="btn btn-sm btn-dark"><span class="fa fa-arrow-up"></span></a>
                        <?php } if(Validation::verificaPermisao($tipoUser, 'permissoes')){ ?>
                        <a title="Listar Permissões" href="<?php echo Url::getBase() . 'permissoes/' . $id; ?>" class="btn btn-sm btn-info"><span class="fa fa-info"></span> Permissões</a>
                        <?php } if(Validation::verificaPermisao($tipoUser, 'edit-nivel-de-acesso')){ ?>
                        <a href="<?php echo Url::getBase() . 'edit-nivel-de-acesso/' . $id; ?>" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span> Editar</a>
                        <?php } if(Validation::verificaPermisao($tipoUser, 'delete-nivel-de-acesso')){ ?>
                        <a href="<?php echo Url::getBase() . './app/delete.php?pag=niveis-de-acessos&tb=user_tipo&ch=id&value=' . $id; ?>" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span> Excluir</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php 
 }else{
    require_once('403.php');   
}