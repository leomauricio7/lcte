<nav class="col-md-2 d-none d-md-block bg-light sidebar" style="position: fixed;">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item text-center">
                <img src="<?php echo Url::getBase() . 'arquivos/users/'.$_SESSION['idUser'].'/'.$_SESSION['img']; ?>" alt="Lct-e" class="rounded-circle" title="<?php echo $_SESSION['user']; ?>" width="80">
                <p class="text-centert"><?php echo $_SESSION['user'].'<br><strong>'.Validation::getTipoUsario($_SESSION['idTipo']).'</strong>'; ?></p>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Menu de Navegação</span>
                <a class="d-flex align-items-center text-muted" href="#">
                    <span data-feather="home"></span>
                </a>
            </h6>
            <?php if(Validation::verificaPermisao($tipoUser, 'home')){ ?>
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo Url::getBase();?>">
                    <span data-feather="home"></span>
                    Página Inicial <span class="sr-only">(current)</span>
                </a>
            </li>
            <?php } ?>
            <?php if(Validation::verificaPermisao($tipoUser, 'licitacoes')){ ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo Url::getBase().'licitacoes';?>">
                    <span data-feather="file"></span>
                    Licitações <span class="sr-only">(current)</span>
                </a>
            </li>
            <?php } ?>
            <?php if(Validation::verificaPermisao($tipoUser, 'usuarios')){ ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo Url::getBase().'usuarios';?>">
                    <span data-feather="users"></span>
                    Gerenciar Usuários
                </a>
            </li>
            <?php } ?>
            <?php if(Validation::verificaPermisao($tipoUser, 'niveis-de-acessos')){ ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo Url::getBase().'niveis-de-acessos';?>">
                    <span data-feather="layers"></span>
                    Niveis de Acesso
                </a>
            </li>
            <?php } ?>
            <?php if(Validation::verificaPermisao($tipoUser, 'paginas')){ ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo Url::getBase().'paginas';?>">
                    <span class=" fa fa-pagelines"></span>&nbsp;&nbsp;
                      Gerenciar Páginas
                </a>
            </li>
            <?php } ?>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Ferramentas Administrativas</span>
            <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="inbox"></span>
            </a>
        </h6>
        <ul class="nav flex-column">
            <?php if(Validation::verificaPermisao($tipoUser, 'exporta-base-dados')){ ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php Url::getBase(); ?>exporta-base-dados">
                    <span data-feather="file-text"></span>
                    Exportar Banco de Dados
                </a>
            </li>
            <?php } ?>
            <?php if(Validation::verificaPermisao($tipoUser, 'importa-base-dados')){ ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo Url::getBase(); ?>importa-base-dados">
                    <span data-feather="file-text"></span>
                    Importar Banco de Dados
                </a>
            </li>
            <?php } ?>
            <?php if(Validation::verificaPermisao($tipoUser, 'importa-planilha')){ ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo Url::getBase(); ?>importa-planilha">
                    <span data-feather="file-text"></span>
                    Importar Planilha 
                </a>
            </li>
            <?php } ?>
            <?php if(Validation::verificaPermisao($tipoUser, 'exporta-planilha')){ ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo Url::getBase(); ?>exporta-planilha">
                    <span data-feather="file-text"></span>
                    Exportar Tabela
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
</nav>