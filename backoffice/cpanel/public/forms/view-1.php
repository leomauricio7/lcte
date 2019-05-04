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
            <i class="fa fa-file-pdf-o"></i> DOCUMENTOS
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>EDITAL</th>
                            <th>AVISO</th>
                            <th>RECURSO</th>
                            <th>ANÁLISE DE RECURSO</th>
                            <th>RESULTADO</th>
                            <th>ARP/CONTRATO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="<?php echo Url::getBase() . 'arquivos/editais/' . $ano . '/' . $pasta . '/' . $id . '/' . $link_edital; ?>" download class="btn btn-sm btn-outline-danger"><i class="fa fa-file-pdf-o"></i> <?php echo $link_aviso; ?></a></td>
                            <td><a href="<?php echo Url::getBase() . 'arquivos/editais/' . $ano . '/' . $pasta . '/' . $id . '/' . $link_aviso; ?>" download class="btn btn-sm btn-outline-danger"><i class="fa fa-file-pdf-o"></i> <?php echo $link_edital; ?></a></td>                        
                            <?php
                            $readRec = new Read();
                            $readRec->ExeRead('edital_recursos', "WHERE id_edital = $idEdital");
                                foreach($readRec->getResult() as $dados){
                                    extract($dados);
                                ?>
                            <td><a href="<?php echo Url::getBase() . 'arquivos/editais/' . $ano . '/' . $pasta . '/' . $id . '/' . $pdf; ?>" download class="btn btn-sm btn-outline-danger"><i class="fa fa-file-pdf-o"></i> <?php echo $pdf; ?></a></td>                     
                            <?php
                                }
                            ?>
                            <?php
                            $readAnaliseRec = new Read();
                            $readAnaliseRec->ExeRead('edital_analise_recursos', "WHERE id_edital = $idEdital");
                                foreach($readAnaliseRec->getResult() as $dados){
                                    extract($dados);
                                ?>
                            <td><a href="<?php echo Url::getBase() . 'arquivos/editais/' . $ano . '/' . $pasta . '/' . $id . '/' . $pdf; ?>" download class="btn btn-sm btn-outline-danger"><i class="fa fa-file-pdf-o"></i> <?php echo $pdf; ?></a></td>                     
                            <?php
                                }
                            ?>
                            <?php
                            $readextrato = new Read();
                            $readextrato->ExeRead('edital_extratos', "WHERE id_edital = $idEdital");
                                foreach($readextrato->getResult() as $dados){
                                    extract($dados);
                                ?>
                            <td><a href="<?php echo Url::getBase() . 'arquivos/editais/' . $ano . '/' . $pasta . '/' . $id . '/' . $pdf; ?>" download class="btn btn-sm btn-outline-danger"><i class="fa fa-file-pdf-o"></i> <?php echo $pdf; ?></a></td>                     
                            <?php
                                }
                            ?>                                     
                            <?php
                            $readArp = new Read();
                            $readArp->ExeRead('edital_arps', "WHERE id_edital = $idEdital");
                                foreach($readArp->getResult() as $dados){
                                    extract($dados);
                                ?>
                            <td><a href="<?php echo Url::getBase() . 'arquivos/editais/' . $ano . '/' . $pasta . '/' . $id . '/' . $pdf; ?>" download class="btn btn-sm btn-outline-danger"><i class="fa fa-file-pdf-o"></i> <?php echo $pdf; ?></a></td>                     
                            <?php
                                }
                            ?>                                   
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-file"></i> OUTROS DOCUMENTOS
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>NOME</th>
                            <th>VERIFICADO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $readDoc = new Read();
                        $read->ExeRead('edital_documentos', "WHERE id_edital = $idEdital");
                        foreach($read->getResult() as $dados){
                            extract($dados);
                        ?>
                        <tr>
                            <td><a href="<?php echo Url::getBase() . 'arquivos/editais/' . $ano . '/' . $pasta . '/' . $id . '/' . $pdf; ?>" download class="btn btn-sm btn-outline-danger"><i class="fa fa-file-pdf-o"></i> <?php echo $pdf; ?></a></td>                     
                            <td><button title="Documento validado pelo sistema" class="btn btn-sm btn-success"><i class="fa fa-check"></i></button></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } 