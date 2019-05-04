<?php if(Validation::verificaPermisao($tipoUser, $url)){ ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page">Início</li>
        <li class="breadcrumb-item active" aria-current="page">Editar Página</li>
    </ol>
</nav>
<?php
$id = Url::getURL(1);
if ($_POST) {
    $update = new Update();
    $dados = Validation::limpaDados(filter_input_array(INPUT_POST, FILTER_DEFAULT));
    $dados = [
        'nome' => $dados['nome'],
        'url' => $dados['url'],
        'legenda' => $dados['legenda']
    ];
    $update->ExeUpdate("pages", $dados, "WHERE id=:id", "id=$id");
    if ($update->getResult()) {
        echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <i class="fa fa-check-circle"></i> Alterações realizadas com sucesso
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" style="cursor: pointer;">&times;</span>
                    </button>
                </div>';
        unset($dados);
    } else {
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                   <i class="fa fa-alert"></i> Erro no processamento das alterações
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true" style="cursor: pointer;">&times;</span>
                   </button>
               </div>';
        unset($dados);
    }
}
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edição de Páginas</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <?php if(Validation::verificaPermisao($tipoUser, 'paginas')){ ?>
        <div class="btn-group mr-2">
            <a class=" btn btn-sm btn-dark" href="<?php echo Url::getBase() . 'paginas'; ?>"><i class="fa fa-list"></i> Lista Páginas</a>
        </div>
        <?php } ?>
    </div>
</div>
<form method="POST" action="">
    <?php
    $read = new Read();
    $read->ExeRead("pages", " WHERE id = $id");
    foreach ($read->getResult() as $dados) {
        extract($dados);
    ?>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-4">
            <input type="text" name="nome" value="<?php echo $nome;?>" class="form-control" id="inputEmail3" placeholder="Nome da Página" required autofocus/>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Url</label>
        <div class="col-sm-4">
            <input type="text" name="url" value="<?php echo $url;?>" class="form-control" id="inputEmail3" placeholder="Url da Página" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Legenda</label>
        <div class="col-sm-4">
            <textarea name="legenda" class="form-control" required><?php echo $legenda; ?></textarea>
        </div>
    </div>
    <?php } ?>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Salvar Alterações</button>
        </div>
    </div>
</form>
<?php 
 }else{
    require_once('403.php');   
}