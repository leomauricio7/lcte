<?php
$idLicitacao = Url::getURL(2);
if ($_POST) {
    $dados = Validation::limpaDados(filter_input_array(INPUT_POST, FILTER_DEFAULT));
    $edital = new Edital();
    $edital->updateEditalIN($dados, $idLicitacao);
    $edital->uploudMultiplo('edital_documentos', $_FILES['linkDOC'], $idLicitacao, $dados['id_tipo'], $dados['ano']);
    $edital->uploudMultiplo('edital_arps', $_FILES['linkARP'], $idLicitacao, $dados['id_tipo'], $dados['ano']);
    $edital->uploudMultiplo('edital_extratos', $_FILES['linkExtrato'], $idLicitacao, $dados['id_tipo'], $dados['ano']);
    $edital->uploudMultiplo('edital_analise_recursos', $_FILES['linkAnaliseRecurso'], $idLicitacao, $dados['id_tipo'], $dados['ano']);
    $edital->uploudMultiplo('edital_recursos', $_FILES['linkRecurso'], $idLicitacao, $dados['id_tipo'], $dados['ano']);
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
                <option value="">Sem Lei</option>
                <option selected value="nos termos da Lei Federal 10.520 de 17/07/2002, subsidiada pela Lei nº 8.666 de 21 junho de 1993">Com Lei</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="descricao" class="col-sm-2">Descrição da Licitação</label>
        <div class="col-sm-10">
            <input type="text" name="descricao" id="descricao" class="form-control" value="<?php echo $descricao; ?>" placeholder="Digite a descrição da licitação" minlength="10" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-4">
            <label for="dataRetirada">Data Retirada</label>
            <input type="date" name="dataRetirada" value="<?php echo $dataRetirada; ?>" id="dataRetirada" class="form-control" required>
        </div>
        <div class="form-group col-4">
            <label for="dataCertame">Data do Certame</label>
            <input type="date" name="dataCertame" value="<?php echo $dataCertame; ?>" id="dataCertame" class="form-control" required>
        </div>
        <div class="form-group col-4">
            <label for="horaCertame">Hora do Certame</label>
            <input type="time" name="horaCertame" value="<?php echo $horaCertame; ?>" id="horaCertame" class="form-control" required>
        </div>	
    </div>
    <div class="form-row">
        <div class="form-group col-4">
            <label for="">Aviso do Edital</label>
            <input name="linkAviso" type="file" class="form-control" />
            <small id="passwordHelpBlock" class="form-text text-muted">
                <i class="fa fa-file-pdf-o"></i> <?php echo $link_aviso; ?>
            </small>
        </div>
        <div class="form-group col-4">
            <label for="linkEdital">Edital</label>
            <input name="linkEdital" type="file" class="form-control" />
            <small id="passwordHelpBlock" class="form-text text-muted">
                <i class="fa fa-file-pdf-o"></i> <?php echo $link_edital; ?>
            </small>
        </div>
        <div class="form-group col-4">
            <label for="linkRecurso">Recurso</label>
            <input name="linkRecurso[]" type="file" class="form-control" multiple />
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-4">
            <label for="linkAnaliseRecurso">Análise do Recurso</label>
            <input name="linkAnaliseRecurso[]" type="file" class="form-control" multiple />
        </div>
        <div class="form-group col-4">
            <label for="linkExtrato">Extrato</label>
            <input name="linkExtrato[]" type="file" class="form-control" multiple />
        </div>
        <div class="form-group col-4">
            <label for="linkARP">ARP ou Contrato</label>
            <input name="linkARP[]" type="file" class="form-control" multiple />
        </div>
    </div>
    <div class="form-group row">
        <label for="tags" class="col-sm-2">Tags de Busca</label>
        <div class="col-sm-6">
            <input type="text" name="tags" value="<?php echo $tags; ?>" id="tags" class="form-control" placeholder="Digite as tags de busca" minlength="5" required>
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
    <div class="form-group row" id="doc" style="display:none;">
        <label for="doc" class="col-sm-2">Documentos</label>
        <div class="col-sm-6">
            <input name="linkDOC[]" type="file" class="form-control"  multiple />
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6">
            <a id="on" class="btn btn-link btn-sm btn-info"><i id="icon" class="fa fa-arrow-up"></i> Documentos <strong style="color:#000;">(opcional)</strong></a>	
        </div>
    </div>
    <hr>
    <?php } ?>
    <div class="form-group row">
        <div class=" col-sm-10">
            <button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Salva Alterações</button>	
        </div>
    </div>
</form>

