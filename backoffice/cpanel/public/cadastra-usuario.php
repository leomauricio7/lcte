<?php if(Validation::verificaPermisao($tipoUser, $url)){ ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page">Início</li>
        <li class="breadcrumb-item active" aria-current="page">Cadastrar Usuário</li>
    </ol>
</nav>
<?php
if ($_POST) {
    $dados = Validation::limpaDados(filter_input_array(INPUT_POST, FILTER_DEFAULT));
    $validaCpf = new ValidaCPFCNPJ($dados['cpf']);
    if ($validaCpf->valida()) {
        $dados['img'] = ($_FILES['img']['tmp_name'] ? $_FILES['img'] : null);
        $dados['created'] =  date('Y-m-d H:i:s');
        $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $file = $_FILES['img'];
        $user = new Usuario();
        $user->createUser($dados);
        if (!$user->getResult()):
            echo $user->getMsg();
        else:
            $uploud = new Uploud();
            $uploud->Imagem($file, 'users/' . $user->getResult() . '/');
            echo $user->getMsg();
            unset($dados);
        endif;
    }else{
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                CPF inválido! Tente novamente.
            </div>';
    }    
}
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cadastrar Usuário</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <?php if(Validation::verificaPermisao($tipoUser, 'usuarios')){ ?>
        <div class="btn-group mr-2">
            <a class=" btn btn-sm btn-dark" href="<?php echo Url::getBase() . 'usuarios'; ?>"><i class="fa fa-list"></i> Lista Usuários</a>
        </div>
        <?php } ?>
    </div>
</div>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputEmail4">Nome</label>
            <input type="text" name="nome"class="form-control" id="inputEmail4" placeholder="Nome" required autofocus />
        </div>
        <div class="form-group col-md-4">
            <label for="inputPassword4">CPF</label>
            <input type="text" name="cpf" class="form-control" id="inputPassword4" placeholder="CPF" minlength="11" maxlength="11" pattern="[0-9]+" required />
        </div>
        <div class="form-group col-md-4">
            <label for="inputPassword4">E-mail</label>
            <input type="email" name="email" class="form-control" id="inputPassword4" placeholder="Email" required />
        </div>
    </div>
    <div class="form-group">
        <div class="custom-file">
            <input type="file" name="img" class="custom-file-input" id="customFile" required>
            <label class="custom-file-label" for="customFile">Selecione sua foto</label>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="password">Senha</label>
            <input type="password" name="senha" class="form-control" id="password" placeholder="senha" minlength="6" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required />
            <small id="passwordHelpInline" class="text-muted">
                A senha de conter no minimo 6 caracteres, sendo letras maisculas e minusculas, números e um caracter especial.
            </small>
        </div>
        <div class="form-group col-md-3">
             <label for="cpf" >Confirma Senha</label>
                <input type="password" class="form-control" id="confirm_password" placeholder="Confirmar Senha" minlength="6" required/>
        </div>
        <div class="form-group col-md-3">
            <label for="inputCity">Nivel de Acesso</label>
            <select class="form-control" name="id_tipo" required>
                <option value="">Selecione</option>
                <?php
                $read = new Read();
                $read->ExeRead("user_tipo");
                foreach ($read->getResult() as $dados) {
                    extract($dados);
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo $tipo; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputCity">Situação</label>
            <select class="form-control" name="id_situacao" required>
                <option value="">Selecione</option>
                <?php
                $read = new Read();
                $read->ExeRead("user_situacao");
                foreach ($read->getResult() as $dados) {
                    extract($dados);
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo $situacao; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Cadastrar</button>
</form>
<?php 
 }else{
    require_once('403.php');   
}