<div class="row">
  <div class="span12">
    <div class="widget widget-nopad">
      <div class="widget-header">
        <h3><i class="fa fa-search"></i> Resultados Encontrados</h3>
      </div>
      <!-- /widget-header -->
      <div class="widget-content">
      <?php 
          if((isset($_GET['tag']) && !is_numeric($_GET['tag'])))
            {
              $tags = filter_input(INPUT_GET, 'tag', FILTER_SANITIZE_ENCODED);
              $result = Licitacao::filtrosSearchTags($tags);
         
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
    </div>
  </div>
</div>