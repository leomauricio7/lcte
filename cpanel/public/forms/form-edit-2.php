<?php
$idLicitacao = Url::getURL(2);
if ($_POST) {
    $dados = Validation::limpaDados(filter_input_array(INPUT_POST, FILTER_DEFAULT));
    $edital = new Edital();
    $edital->update($dados, $idLicitacao);
    echo $edital->getMsg();
}
?>
<form name="form" method="post" action="" enctype="multipart/form-data">
   <?php
    $read = new Read();
    $read->ExeRead('editais', "WHERE id = $idLicitacao");
    foreach($read->getResult() as $dados){
        extract($dados); 
        $ano_edital = $ano;
   ?>
    <div class="form-group row">
        <label for="ano" class="col-sm-2 col-form-label">Ano/Publicação</label>
        <div class="col-sm-3">
            <select name="ano" class="form-control" required>
                <option value="">Selecione o ano </option>
                <?php
                $read = new Read();
                $read->ExeRead("edital_anos");
                foreach ($read->getResult() as $dados) {
                    extract($dados);
                    ?>
                    <option <?php if($ano_edital == $ano){ echo 'selected'; }?> value="<?php echo $ano; ?>"><?php echo $ano; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="tipo" class="col-sm-2 col-form-label">Tipo/Edital</label>
        <div class="col-sm-3">
            <input type="radio" name="id_tipo" checked value="<?php echo Url::getURL(1); ?>"> <?php echo $tipoEdital; ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="lei" class="col-sm-2">Lei</label>
        <div class="col-sm-4">
            <select name="lei" id="lei" class="form-control" required>
                <option value="">Selecione a lei</option>
                <option value="Sem Lei">Sem Lei</option>
                <option value="nos termos da Lei Federal 10.520 de 17/07/2002, subsidiada pela Lei nº 8.666 de 21 junho de 1993">Com Lei</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="descricao" class="col-sm-2">Descrição da Licitação</label>
        <div class="col-sm-10">
            <input type="text" name="descricao" value="<?php echo $descricao; ?>" id="descricao" class="form-control" placeholder="Digite a descrição da licitação" minlength="10" required>
        </div>
    </div>
    <div class="form-row">
        <label for="dataCertame" class="col-sm-2">Data do Certame</label>
        <div class="col-sm-4">
            <input type="date" name="dataCertame" value="<?php echo $dataCertame; ?>" id="dataCertame" class="form-control" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-6">
            <label for="linkEdital">Termo Adesão</label>
            <input name="termo_adesao" type="file" class="form-control"/>
            <small id="passwordHelpBlock" class="form-text text-muted">
                <i class="fa fa-file-pdf-o"></i> <?php echo $termo_adesao; ?>
            </small>
        </div>
        <div class="form-group col-6">
            <label for="linkEdital">Contrato</label>
            <input name="contrato" type="file" class="form-control" />
            <small id="passwordHelpBlock" class="form-text text-muted">
                <i class="fa fa-file-pdf-o"></i> <?php echo $contrato; ?>
            </small>            
        </div>
    </div>
    <div class="form-group row">
        <label for="tags" class="col-sm-2">Tags de Busca</label>
        <div class="col-sm-6">
            <input type="text" name="tags" id="tags" value="<?php echo $tags; ?>" class="form-control" placeholder="Digite as tags de busca" minlength="5" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="situacao" class="col-sm-2">Situação</label>
        <div class="col-sm-4">
            <select name="id_situacao" id="situacao" class="form-control" required>
                <option value="">Selecione a situação</option>
                <?php
                $read = new Read();
                $read->ExeRead("edital_situacao");
                foreach ($read->getResult() as $dados) {
                    extract($dados);
                    ?>
                    <option <?php if($id_situacao == $id){echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $situacao; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <?php } ?>
    <hr>
    <div class="form-group row">
        <div class=" col-sm-10">
            <button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Salvar Alterações</button>	
        </div>
    </div>
</form>