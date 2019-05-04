<?php if(Validation::verificaPermisao($tipoUser, $url)){ ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page">Início</li>
        <li class="breadcrumb-item active" aria-current="page">Usuários Cadastrados</li>
    </ol>
</nav>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Usuários Cadastrados</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <?php if(Validation::verificaPermisao($tipoUser, 'cadastra-usuario')){ ?>
        <div class="btn-group mr-2">
            <a class=" btn btn-sm btn-dark" href="<?php echo Url::getBase().'cadastra-usuario'; ?>"><i class="fa fa-plus-circle"></i> Cadastrar Usuário</a>
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
                <th>CPF</th>
                <th>Nivel de Acesso</th>
                <th>Situação</th>
                <th>Data do Cadastro</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $read= new Read();
            $read->ExeRead("users");
            foreach($read->getResult() as $dados){
                extract($dados);
                $valida_cpf = new ValidaCPFCNPJ($cpf);
            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $nome; ?></td>
                <td><?php echo $valida_cpf->formata(); ?></td>
                <td><?php echo Validation::getTipoUsario($id_tipo); ?></td>
                <td>
                    <span class="badge badge-<?php if($id_situacao==2){echo 'danger';}else{echo 'success';}?>">
                    <?php echo Validation::getSituacaoUsario($id_situacao); ?>
                    </span>
                </td>
                <td><?php echo $created; ?></td>
                <td>
                    <?php if(Validation::verificaPermisao($tipoUser, 'edit-usuario')){ ?>
                    <a href="<?php echo Url::getBase().'edit-usuario/'.$id;?>" class="btn btn-sm btn-warning"> <span class="fa fa-edit"></span> Editar</a>
                    <?php } if(Validation::verificaPermisao($tipoUser, 'delete-usuario')){ ?>
                    <a href="<?php echo Url::getBase() . './app/delete.php?pag=usuarios&tb=users&ch=id&value=' . $id; ?>" class="btn btn-sm btn-danger"> <span class="fa fa-trash"></span> Excluir</a>
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