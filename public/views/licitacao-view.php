<div class="row">
  <div class="span12">
    <!-- /widget -->
    <div class="widget widget-table action-table">
      <div class="widget-header"> <i class="fa fa-group"></i>
        <h3>Modalidade: <?php echo utf8_encode(Licitacao::getNameTipo(Url::getURL(1))) ?></h3>
      </div>
      <!-- /widget-header -->
      <div class="widget-content">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th> OBJETO/FINALIDADE </th>
              <th> DATA DO CERTAME</th>
              <th> SITUAÇÃO</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php $edital = Licitacao::getFindOneLicitacao(Url::getURL(2)) ?>
              <td><?php echo $edital[0]['descricao'] ?></td>
              <td><?php echo date('d/m/Y',strtotime($edital[0]['dataCertame'])) ?></td>
              <td><?php echo $edital[0]['situacao'] ?></td>
            </tr>                
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php 
  if($edital[0]['id_tipo'] == 5 || $edital[0]['id_tipo'] == 6){
    require_once 'tables/tipo-2.php';
  }else{
    require_once 'tables/tipo-1.php';
  }
  ?>
  <div class="span12">
      <div class="widget widget-nopad">
        <div class="widget-header"> 
          <h3><i class="fa fa-list-alt"></i> Últimos Certames da Modalidade: <?php echo utf8_encode($edital[0]['tipo_edital']); ?></h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <ul class="news-items">
            <?php
              foreach(Licitacao::getLicitacoesPorTipo('where el.pasta = "'.Url::getURL(1).'"', 'LIMIT 5') as $dados){
                extract($dados);
              ?>
            <li>    
              <div class="news-item-date"> <span class="news-item-day"><?php echo $dia ?></span> <span class="news-item-month"><?php echo $mes ?></span> </div>
              <div class="news-item-detail"> <a href="<?php echo Url::getBase() ?>licitacao-view/<?php echo $pasta.'/'.$id ?>" class="news-item-title"><?php echo utf8_encode($tipo_edital); ?></a>
              <p class="news-item-preview"><?php echo $descricao; ?></p>
              </div> 
            </li>
            <?php } ?> 
          </ul>
        </div>
        <!-- /widget-content --> 
      </div> <!-- widget widget-nopad -->
    </div> <!-- /span-12 --> 
</div><!-- /row --> 
    