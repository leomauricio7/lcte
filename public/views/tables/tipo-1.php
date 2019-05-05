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
            <th class="td-actions"> AVISO </th>
            <th class="td-actions"> EDITAL </th>
            <th class="td-actions"> RECURSO </th>
            <th class="td-actions"> ANÁLISE DE RECURSO </th>
            <th class="td-actions"> RESULTADO </th>
            <th class="td-actions"> ARP/CONTRATO </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <!-- aviso de edital -->
            <td class="td-actions">
              <a 
              href="<?php echo Url::getBase().'backoffice/cpanel/arquivos/editais/'.$edital[0]['ano'].'/'.$edital[0]['pasta'].'/'.$edital[0]['id'].'/'.$edital[0]['link_aviso']; ?>"
              download
              class="btn btn-sm btn-success">
              <i class="fa fa-file-pdf"></i> <?php echo $edital[0]['link_aviso']; ?></a>
            </td>
            <!-- edital -->
            <td class="td-actions">
              <?php if (date("Y-m-d") < $edital[0]["dataCertame"]){ ?>  
                <a 
                href="<?php echo Url::getBase() ?>protocolo-retirada/<?php echo $edital[0]['id']; ?>"
                download
                class="btn btn-sm btn-success"
                >
                  <i class="fa fa-file-pdf"></i> 
                  <?php echo $edital[0]['link_edital']; ?>
                </a>
              <?php }else { ?>
                <a 
                href="<?php echo Url::getBase().'backoffice/cpanel/arquivos/editais/'.$edital[0]['ano'].'/'.$edital[0]['pasta'].'/'.$edital[0]['id'].'/'.$edital[0]['link_edital']; ?>"
                download
                class="btn btn-sm btn-success"
                >
                  <i class="fa fa-file-pdf"></i> 
                  <?php echo $edital[0]['link_edital']; ?>
                </a>
              <?php } ?>
            </td>
            <!-- recursos -->
            <td class="td-actions">
                <?php 
                  foreach(Licitacao::getRecursosLicitacao($edital[0]['id']) as $dados){
                    extract($dados)
                ?>
                  <a 
                  href="<?php echo Url::getBase().'backoffice/cpanel/arquivos/editais/'.$edital[0]['ano'].'/'.$edital[0]['pasta'].'/'.$edital[0]['id'].'/'.$pdf; ?>"
                  class="btn btn-sm btn-success"
                  download>
                  <i class="fa fa-file-pdf"></i> <?php echo $pdf; ?></a> 
                <?php } ?>
            </td>
            <!-- analises de recursos -->
            <td class="td-actions">
              <?php 
                foreach(Licitacao::getAnaliseRecursosLicitacao($edital[0]['id']) as $dados){
                  extract($dados)
              ?>
                <a 
                href="<?php echo Url::getBase().'backoffice/cpanel/arquivos/editais/'.$edital[0]['ano'].'/'.$edital[0]['pasta'].'/'.$edital[0]['id'].'/'.$pdf; ?>"
                class="btn btn-sm btn-success"
                download>
                <i class="fa fa-file-pdf"></i> <?php echo $pdf; ?></a> 
              <?php } ?>
            </td>
            <!-- extratos -->
            <td class="td-actions">
              <?php 
                foreach(Licitacao::getAnaliseRecursosLicitacao($edital[0]['id']) as $dados){
                  extract($dados)
              ?>
                <a 
                href="<?php echo Url::getBase().'backoffice/cpanel/arquivos/editais/'.$edital[0]['ano'].'/'.$edital[0]['pasta'].'/'.$edital[0]['id'].'/'.$pdf; ?>"
                class="btn btn-sm btn-success"
                download>
                <i class="fa fa-file-pdf"></i> <?php echo $pdf; ?></a> 
              <?php } ?>
            </td>

            <td class="td-actions">
              <?php 
                foreach(Licitacao::getARPLicitacao($edital[0]['id']) as $dados){
                  extract($dados)
              ?>
                <a 
                href="<?php echo Url::getBase().'backoffice/cpanel/arquivos/editais/'.$edital[0]['ano'].'/'.$edital[0]['pasta'].'/'.$edital[0]['id'].'/'.$pdf; ?>"
                class="btn btn-sm btn-success"
                download>
                <i class="fa fa-file-pdf"></i> <?php echo $pdf; ?></a> 
              <?php } ?>
            </td>

          </tr>                
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="span12">
    <div class="widget widget-table action-table">
      <div class="widget-header">
        <h3><i class="fa fa-file"></i> Outros Arquivos</h3>
      </div>
    <!-- /widget-header -->
    <div class="widget-content">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th class="td-actions"> Nome </th>
            <th class="td-actions"> Visualizar </th>
          </tr>
        </thead>
        <tbody>
          <?php 
            foreach(Licitacao::getDocumentosLicitacao($edital[0]['id']) as $dados){
              extract($dados)
            ?>
              <tr>
                <td style="text-align: center;"><?php echo $pdf; ?></td>

                <td class="td-actions">
                  <a 
                  href="<?php echo Url::getBase().'backoffice/cpanel/arquivos/editais/'.$edital[0]['ano'].'/'.$edital[0]['pasta'].'/'.$edital[0]['id'].'/'.$pdf; ?>"
                  download
                  class="btn btn-sm btn-success">
                  <i class="fa fa-file-pdf"></i> 
                  </a>
                </td>
              </tr> 
            <?php } ?>
        </tbody>
      </table>
    </div>
  </div>           
</div>