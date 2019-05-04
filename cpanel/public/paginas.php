<?php if(Validation::verificaPermisao($tipoUser, $url)){ ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page">Início</li>
        <li class="breadcrumb-item active" aria-current="page">Páginas</li>
    </ol>
</nav>
<?php
    if (!empty($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Páginas Cadastradas</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <?php if(Validation::verificaPermisao($tipoUser, 'cadastra-pagina')){ ?>
        <div class="btn-group mr-2">
            <a class=" btn btn-sm btn-dark" href="<?php echo Url::getBase() . 'cadastra-pagina'; ?>"><i class="fa fa-plus-circle"></i> Cadastrar Página</a>
        </div>
        <?php } ?>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Url</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $read = new REad();
            $read->ExeRead("pages", "ORDER BY id ASC");
            foreach ($read->getResult() as $dados) {
                extract($dados);
                ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nome; ?></td>
                    <td><?php echo $url; ?></td>
                    <td>
                        <?php if(Validation::verificaPermisao($tipoUser, 'edit-pagina')){ ?>
                        <a href="<?php echo Url::getBase() . 'edit-pagina/' . $id; ?>" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span> Editar</a>
                        <?php } if(Validation::verificaPermisao($tipoUser, 'delete-pagina')){ ?>
                        <a href="<?php echo Url::getBase() . './app/delete.php?pag=paginas&tb=pages&ch=id&value=' . $id; ?>" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span> Excluir</a>
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