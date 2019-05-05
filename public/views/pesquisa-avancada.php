<div class="row">
  <!-- /widget --> 
  <div class="span12">
    <div class="widget widget-nopad">
        <div class="widget-header">
          <h3><i class="fa fa-search"></i> Pesquisa avançada</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div class="col-md-12">
            <div class="well">
              <form class="form-inline" method="GEt" action="<?php echo Url::getBase() ?>pesquisa-avancada">                 
                  <select name="ano" id="ano" class="form-control" style="width: 60px;"required>
                      <option value="">Ano </option>
                      <?php foreach(Licitacao::getAnos() as $dados){
                          extract($dados);
                      ?>
                          <option value="<?php echo $ano ?>"><?php echo $ano ?></option>
                      <?php } ?>
                  </select>
                  
                  <select name="tipo" class="form-control" required>
                      <option value=""> Modalidade</option>
                      <?php foreach(Licitacao::getTipoLicitacoes() as $dados){
                          extract($dados);
                      ?>
                          <option value="<?php echo $pasta ?>"><?php echo utf8_encode($tipo) ?></option>
                      <?php } ?>
                  </select>                  
                  
                  <select name="situacao" id="situacao" class="form-control" style="width: 80px;" required>
                      <option value="">Status</option>
                      <?php foreach(Licitacao::getStatus() as $dados){
                          extract($dados);
                      ?>
                          <option value="<?php echo $id ?>"><?php echo $situacao ?></option>
                      <?php } ?>
                  </select>
                  <button type="submit" class="btn btn-md btn-success">Pesquisar</button>                         
              </form> 
            </div>
          
          <?php 
          if( 
            (isset($_GET['ano']) && is_numeric($_GET['ano']))
            &&
            (isset($_GET['situacao']) && is_numeric($_GET['situacao']))
            )
            {
              $ano = filter_input(INPUT_GET,'ano');
              $tipo = filter_input(INPUT_GET,'tipo');
              $situacao = filter_input(INPUT_GET, 'situacao', FILTER_SANITIZE_ENCODED);
              $result = Licitacao::filtrosSearch($ano, $tipo, $situacao);
         
          ?>
          
          <div class="panel panel-default" style="padding: 20px;">

            <div class="panel-heading">
              <h3><i class="fa fa-folder-open"></i> Licitações encontradas</h3><hr>
            </div>

            <div class="panel-body">

              <?php if(count($result) == 0){
                echo "<p style='text-align: center;'>Nenhuma licitação encontrada.</p>"; 
              }else{?>

              
                <?php 
                    foreach($result as $dados){
                      extract($dados);
                ?>

                  <div class="media">
                    <div class="media-left" style="position: absolute">
                      <a href="<?php echo Url::getBase().'licitacao-view/'.$pasta.'/'.$id ?>">
                        <i class="fa fa-file-pdf fa-3x"></i>
                      </a>
                    </div>
                    <div class="media-body" style="margin-left: 5%">
                      <h4 class="media-heading"><?php echo $tipo_edital ?></h4>
                      <?php echo utf8_decode($descricao) ?>
                    </div>
                  </div><hr>

                <?php } ?>
              
              <?php } ?>
            </div>
          </div>
          <?php } ?> 
        </div>              
      </div><!-- /widget-content --> 
    </div>
  </div>
</div><!-- /row --> 