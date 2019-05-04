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
        <h1 class="h2">Licitações Cadastradas</h1>
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
    <div class="table-responsive">
        <table class="table table-striped table-sm text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ano</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Situação</th>
                    <th>Data Certame</th>
                    <th>Data da Publicação</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $read = new Read();
                $read->listarEditais();
                foreach ($read->getResult() as $dados) {
                    extract($dados);
                    ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $ano; ?></td>
                        <td><?php echo substr($descricao, 0,30).' [...]'; ?></td>
                        <td><?php echo utf8_encode($tipo); ?></td>
                        <td><?php echo $situacao; ?></td>
                        <td><?php echo Data::DataFormat($dataCertame); ?></td>
                        <td><?php echo Data::DataFormat($created); ?></td>
                        <td>
                            <?php if (Validation::verificaPermisao($tipoUser, 'view-licitacao')) { ?> 
                            <a href="<?php echo Url::getBase() . 'view-licitacao/' . $pasta. '/'. $id; ?>" class="btn btn-sm btn-success"> <span class="fa fa-eye-slash"></span> Detalhar</a>
                            <?php } if (Validation::verificaPermisao($tipoUser, 'edit-licitacao')) { ?>
                                <a href="<?php echo Url::getBase() . 'edit-licitacao/' . $pasta. '/' . $id; ?>" class="btn btn-sm btn-warning"> <span class="fa fa-edit"></span> Editar</a>
                            <?php } if (Validation::verificaPermisao($tipoUser, 'delete-licitacao')) { ?>
                                <a href="<?php echo Url::getBase() . './app/delete.php?pag=licitacoes&tb=editais&ch=id&value=' . $id; ?>" class="btn btn-sm btn-danger"> <span class="fa fa-trash"></span> Excluir</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
} else {
    require_once('403.php');
}