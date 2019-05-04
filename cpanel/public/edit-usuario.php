<?php if(Validation::verificaPermisao($tipoUser, $url)){ ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page">Início</li>
        <li class="breadcrumb-item active" aria-current="page">Editar Usuário</li>
    </ol>
</nav>
<?php
$id = Url::getURL(1);
if ($_POST) {
    $dados = Validation::limpaDados(filter_input_array(INPUT_POST, FILTER_DEFAULT));
    $validaCpf = new ValidaCPFCNPJ($dados['cpf']);
    if ($validaCpf->valida()) {
        $dados['img'] = ($_FILES['img']['name']);
        $dados['modified'] = date('Y-m-d H:i:s');
        $file = $_FILES['img'];
        //verifica se o usuario enviou alguma imagem
        if (!empty($dados['img'])):
            $uploud = new Uploud();
            $uploud->ImagemEdit($file, 'users/' . Url::getURL(1) . '/');
            //verifica se foi feito o upload
            if (!$uploud->getResult()):
                echo $uploud->getMsg();
            else:
                $dadosUpdate = ['nome'=>$dados['nome'],'cpf'=>$dados['cpf'],'email'=>$dados['email'],'id_tipo'=>$dados['id_tipo'],'id_situacao'=>$dados['id_situacao'],'modified'=>$dados['modified'],'img'=>$dados['img']];
            endif;
        else:
            $dadosUpdate = ['nome'=>$dados['nome'],'cpf'=>$dados['cpf'],'email'=>$dados['email'],'id_tipo'=>$dados['id_tipo'],'id_situacao'=>$dados['id_situacao'],'modified'=>$dados['modified']];
        endif;
        $update = new Update();
        $update->ExeUpdate('users', $dadosUpdate, 'WHERE id = :id', 'id=' . Url::getURL(1) . '');
        if ($update->getResult()):
            echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 align="center"><i class="fa fa-check-circle"></i> Alterações realizadas com sucesso.</h5>
                </div>';
        endif;
    }else {
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                CPF inválido! Tente novamente.
            </div>';
    }
}
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar Usuário</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <?php if(Validation::verificaPermisao($tipoUser, 'usuarios')){ ?>
        <div class="btn-group mr-2">
            <a class=" btn btn-sm btn-dark" href="<?php echo Url::getBase() . 'usuarios'; ?>"><i class="fa fa-list"></i> Lista Usuários</a>
        </div>
        <?php } ?>
    </div>
</div>
<form method="post" action="" enctype="multipart/form-data">
    <?php
    $read = new Read();
    $read->ExeRead("users", " WHERE id = $id");
    foreach ($read->getResult() as $dados) {
        extract($dados);
        ?>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Nome</label>
                <input type="text" name="nome" value="<?php echo $nome; ?>" class="form-control" id="inputEmail4" placeholder="Nome" required autofocus />
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">CPF</label>
                <input type="text" name="cpf" class="form-control" value="<?php echo $cpf; ?>" id="inputPassword4" placeholder="CPF" minlength="11" maxlength="11" pattern="[0-9]+" required />
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">E-mail</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" id="inputPassword4" placeholder="Email" required />
            </div>
        </div>
        <div class="form-group">
            <div class="custom-file">
                <input type="file" name="img" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Selecione sua foto</label>
            </div>
        </div>
        <div class="form-row">
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
                        <option <?php if($id_tipo == $id){echo 'selected';}?> value="<?php echo $id; ?>"><?php echo $tipo; ?></option>
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
                        <option <?php if($id_situacao == $id){echo 'selected';}?> value="<?php echo $id; ?>"><?php echo $situacao; ?></option>
                        <?php
                    }
                    ?>
            </select>
        </div>
    </div>
    <?php 
    }
    ?>
    <button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Salvar Alterações</button>
</form>
<?php 
 }else{
    require_once('403.php');   
}
