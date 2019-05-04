<?php 
$_token = addslashes(filter_input(INPUT_GET, "_token", FILTER_DEFAULT));
if(isset($_token) && !empty($_token)){
    if(Validation::verificaToken($_token)){ 
?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col text-center">
            <a href="<?php echo Url::getBase(); ?>">
                <img class="mb-4" id="img-logo" src="<?php echo Url::getBase() ?>img/logo-branco.png" alt="Lct-e v2">
            </a>
            <h1 class="h3 mb-3 font-weight-normal title">Recuperação de Senha</h1>
            <form class="form-signin" method="post" action="">
                <?php                    
                    /*###########################################################################*/
                    if ($_POST):
                        $valida = new Validation();
                        //pegando os valores do formulario
                        $novaSenha = addslashes(filter_input(INPUT_POST, "novaSenha", FILTER_SANITIZE_MAGIC_QUOTES));
                        //fazendo a validação
                        if($valida->updateSenha($_token, $novaSenha)){
                            $_SESSION['msg'] = '<div class="alert alert-success"><i class="fa fa-warning"></i> Senha alterada com sucesso.</div>';
                            echo '<script>window.location.href="'.Url::getBase().'"</script>';
                        }
                    endif;               
                ?>
                <p>
                    Digite sua nova senha de acesso.
                </p>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" id="password" name="novaSenha" class="form-control" placeholder="Nova senha" minlength="6" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required autofocus>
                        <div class="input-group-prepend">
                            <span
                            class="input-group-text info"
                            data-toggle="info-senha" 
                            title="Requerimentos da senha" 
                            data-content="
                            A senha deve ter no minimo 6 caracteres sendo alfanuméricos, letras maiúsculas e minúsculas, números e símbolos."
                            ><i class="fa fa-info-circle"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span 
                            class="input-group-text"
                            data-placement="left"
                            data-toggle="info-confirm-senha" 
                            title="Atenção" 
                            data-content="
                            As senhas não coincidem."
                            ><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" id="confirm_password" class="form-control" placeholder="Confirme senha" required>
                    </div>
                </div>
                <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-key"></i> Alterar Senha</button>
                <a href="<?php echo Url::getBase() ?>" class="btn btn-info btn-sm"><i class="fa fa-arrow-circle-right"></i> Voltar</a>
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

<?php  }else{
    $_SESSION['msg'] =
            '<div class="alert alert-danger">'
            . '<i class="fa fa-warning"></i>'
            . ' O link de recuperação de senha expirou ou não existe. Mais informações entre em contato com o suporte.'
            . '</div>';
    echo '<script>window.location.href="'.Url::getBase().'"</script>';
    }
}else{
?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col text-center">
            <a href="<?php echo Url::getBase(); ?>">
                <img class="mb-4" id="img-logo" src="<?php echo Url::getBase() ?>img/logo-branco.png" alt="Lct-e v2">
            </a>
            <h1 class="h3 mb-3 font-weight-normal title">Recuperar Senha</h1>
            <form class="form-signin" method="post" action="">
                <?php                    
                    /*###########################################################################*/
                    if ($_POST):
                        $valida = new Validation();
                        //pegando os valores do formulario
                        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_MAGIC_QUOTES);
                        $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_MAGIC_QUOTES);
                        //setando os valores nos metodos
                        $valida->setEmail($email);
                        $valida->setCpf($cpf);

                        //fazendo a validação
                        $valida->recuperaSenha();
                        echo $valida->getMsg();
                    endif;               
                ?>
                <p>
                Digite seu cpf e email para recuperar sua senha.
                </p>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" id="cpf" name="cpf" class="form-control" maxlength="11" minlenght="11" placeholder="CPF - Ex:. xxx.xxx.xxx-xx" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required>
                    </div>
                </div>
                <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-unlock-alt"></i> Recuperar</button>
                <a href="<?php echo Url::getBase() ?>" class="btn btn-info btn-sm"><i class="fa fa-arrow-circle-right"></i> Voltar</a>
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
<?php }