<?php
    $read = new Read();
    $read->listarEditais("WHERE e.id = $idEdital");
    foreach ($read->getResult() as $dados) {
        extract($dados);
?>
<div class="card">
        <div class="card-header">
            <i class="fa fa-tasks"></i> Modalidade: <?php echo utf8_encode($tipo); ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>OBJETIVO/FINALIDADE</th>
                            <th>DATA DO CERTAME</th>
                            <th>SITUAÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td><?php echo $descricao; ?></td>
                                <td><?php echo Data::DataFormat($dataCertame); ?></td>                        
                                <td><?php echo $situacao; ?></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-file"></i> DOCUMENTOS
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>TERMO DE ADESÃO</th>
                            <th>CONTRATO</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td><a href="<?php echo Url::getBase().'arquivos/editais/'.$ano.'/'.$pasta.'/'.$id.'/'.$termo_adesao;?>" download class="btn btn-sm btn-outline-danger"><i class="fa fa-file-pdf-o"></i> <?php echo $termo_adesao; ?></a></td>
                                <td><a href="<?php echo Url::getBase().'arquivos/editais/'.$ano.'/'.$pasta.'/'.$id.'/'.$contrato;?>" download class="btn btn-sm btn-outline-danger"><i class="fa fa-file-pdf-o"></i> <?php echo $contrato; ?></a></td>                        
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php } ?>