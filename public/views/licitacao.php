
      <div class="row">
        <div class="span12">
          <!-- /widget -->
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-group"></i>
              <h3><?php echo utf8_encode(Licitacao::getNameTipo(Url::getURL(1))) ?></h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> OBJETO </th>
                    <th> DATA</th>
                    <th> SITUAÇÃO</th>
                    <th class="td-actions"> VISUALIZAR </th>
                  </tr>
                </thead>
                <tbody> 
                    <?php
                    foreach(Licitacao::getLicitacoesPorTipo('where el.pasta = "'.Url::getURL(1).'"') as $dados){
                      extract($dados);
                    ?>
                   <tr>
                      <td><?php echo $descricao; ?></td>
                      <td><?php echo date('d/m/Y', strtotime($dataCertame)); ?></td>
					            <td><?php echo $situacao; ?></td>
					            <td class="td-actions">
                        <a 
                        href="<?php echo Url::getBase() ?>licitacao-view/<?php echo $pasta.'/'.$id; ?>"
                        class="btn  btn-success"><i class="fa fa-clipboard-check"></i></a>
                      </td>
                   </tr>
                  <?php } ?>
                </tbody>
              </table>  			  
            </div>
            <!-- /widget-content --> 
          </div>               
      </div>
    </div>   
</div>