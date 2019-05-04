<div class="container">

    <div class="row justify-content-md-center">

        <div class="col text-center">
            <a href="<?php echo Url::getBase(); ?>">
                <img class="mb-4" id="img-logo" src="<?php echo Url::getBase() ?>img/logo-branco.png" alt="Lct-e v2">
            </a>
            <h1 class="h3 mb-3 font-weight-normal title">Ambiente Restrito</h1>
            <form class="form-signin" method="post" action="">
                <?php
                if (isset($_SESSION['logado'])):
                    echo '<script>window.location.href="cpanel/";</script>';
                else:
                    unset($_SESSION['logado']);
                endif;
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                if ($_POST) {
                    $valida = new Validation();
                    if ($valida->verificaRecaptcha($_POST['g-recaptcha-response'])):
                        $valida->setLogin(filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING));
                        $valida->setSenha(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
                        if ($valida->logar()) {
                            echo '<script>window.location.href="cpanel/";</script>';
                        } else {
                            echo '<script>window.history.go(-1);</script>';
                        }
                    else:
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Atenção!</strong> recaptcha inválido.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                    endif;
                }
                ?>
                <p>
                Digite seu usuário e senha para iniciar a sessão.
                </p>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" maxlength="11" pattern="[0-9]+" minlength="11" id="inputEmail" name="cpf" class="form-control" placeholder="CPF - Ex:. xxx.xxx.xxx-xx" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" id="senha" name="password" placeholder="Senha" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text" id="olho"><i class="fa fa-eye"></i></div>
                        </div>
                        <label class="sr-only" for="senha">Senha</label>
                    </div>
                </div>

                <div class="checkbox mb-3">
                    <div class="g-recaptcha" data-sitekey="6Lelv2oUAAAAAKqDbwRpG6W79ppJB1Fs1Int7ca2"></div>
                </div>

                <button class="btn btn-success btn-sm" type="submit">Fazer Login <i class="fa fa-sign-out-alt"></i></button>
                <a href="<?php echo Url::getBase() . 'recupera-senha'; ?>" class="btn btn-danger btn-sm"><i class="fa fa-unlock-alt"></i> Esqueci minha senha</a><br>
                <p class="mt-2 text-muted text-center">
                    &copy 2019 - Todos os direitos reservados<br>
                    <a style="margin-right: 10px; margin-top: 8px;" href="http://ltec.000webhostapp.com/"><img src="./img/icon-ltec.png"/></a>
                    <a href="#"><img src="./img/marcelo.png" alt=""></a><br>
                    <span class="text-version" data-toggle="tooltip" data-placement="right" title="Versão atual do sistema">Versão 1.0.1</span>
                </p>
            </form>
        </div>

    </div>

</div>