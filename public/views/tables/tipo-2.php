<div class="span12">
    <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-file"></i>
            <h3>Documentos</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>  
                        <th class="td-actions"> TERMO </th>
                        <th class="td-actions"> CONTRATO </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-actions">
                            <a 
                            href="<?php echo Url::getBase().'backoffice/cpanel/arquivos/editais/'.$edital[0]['ano'].'/'.$edital[0]['pasta'].'/'.$edital[0]['id'].'/'.$edital[0]['termo_adesao']; ?>" 
                            target="_blank"
                            class="btn btn-sm btn-success"
                            >
                                <i class="fa fa-file-pdf"></i>
                            <?php echo $edital[0]['termo_adesao']; ?></a>
                        </td>
                        <td class="td-actions">
                            <a 
                            href="<?php echo Url::getBase().'backoffice/cpanel/arquivos/editais/'.$edital[0]['ano'].'/'.$edital[0]['pasta'].'/'.$edital[0]['id'].'/'.$edital[0]['contrato']; ?>"
                            target="_blank"
                            class="btn btn-sm btn-success"
                            >
                            <i class="fa fa-file-pdf"></i>
                            <?php echo $edital[0]['contrato']; ?></a>
                        </td>
                    </tr>                
                </tbody>
            </table>
        </div>
    </div>            
</div>