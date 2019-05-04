<?php if(Validation::verificaPermisao($tipoUser, $url)){ ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page">Início</li>
        <li class="breadcrumb-item active" aria-current="page">Permissões</li>
    </ol>
</nav>
<?php
    if (!empty($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Permissões</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <?php if(Validation::verificaPermisao($tipoUser, 'niveis-de-acessos')){ ?>
        <div class="btn-group mr-2">
            <a class=" btn btn-sm btn-dark" href="<?php echo Url::getBase().'niveis-de-acessos'; ?>"><i class="fa fa-list"></i> Niveis de Acessos</a>
        </div>
        <?php } ?>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Página</th>
                <th>Nivel de acesso</th>
                <th>Permissão</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $read = new Read();
                $nivelPermission = Url::getURL(1);
                $read->consultaPermissoes("WHERE u.id_user_tipo = $nivelPermission ORDER BY u.id ASC");
                foreach($read->getResult() as $dados){
                    extract($dados);
            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><i class="fa fa-info-circle" title="<?php echo $legenda; ?>"></i> <?php echo $pagina; ?></td>
                <td><i class="fa fa-user-secret" title="Tipo de Usuário"></i> <?php echo $tipoUsers; ?></td>
                <?php if(Validation::verificaPermisao($tipoUser, 'processa_permissao')){ ?>
                <td><a href="<?php echo Url::getBase() . './app/Class/processa_permissao.php?id='.$id; ?>" ><span class="badge badge-<?php if($id_situacao_permission==0){echo 'danger';}else{echo 'success';}?>"><i class="fa fa-info-circle" title="Situação da Permissão"></i> <?php echo $situacao; ?></span></a></td>
                <?php } ?>
            </tr>
                <?php } ?>
        </tbody>
    </table>
</div>
<?php 
 }else{
    require_once('403.php');   
}