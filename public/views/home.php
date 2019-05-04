    <div class="row">
        <!-- tipos de licitaç~eos cadastradas -->
        <div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Modalidades de Licitações</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts">
                <?php foreach(Licitacao::getTipoLicitacoes() as $dados){
                    extract($dados);
                ?>
                  <a 
                  href="<?php echo Url::getBase().'licitacao/'.$pasta ?>"
                  class="shortcut">
                  <i class="fa fa-book-open"></i>
                  <?php echo utf8_encode($tipo) ?></span> </a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <!-- PESQUISA RÁPIDA -->  
        <div class="span5">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-search"></i>
              <h3>Pesquisa Rápida</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="well" style="margin-bottom: 0px;padding: 12px;">
                <form class="form-inline" method="get" action="<?php echo Url::getBase() ?>pesquisa-avancada?">                 
                    <select name="ano" id="ano" class="form-control" style="width: 60px;" required>
                        <option value="">Ano </option>
                        <?php foreach(Licitacao::getAnos() as $dados){
                            extract($dados);
                        ?>
                            <option value="<?php echo $ano ?>"><?php echo $ano ?></option>
                        <?php } ?>
                    </select>
                    
                    <select name="tipo" class="form-control" style="width: 100px;" required>
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
            </div>
        </div>
    </div>        
     <!-- /widget --> 
    <div class="span12">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Últimas Licitações</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <ul class="news-items">
                <?php 
                    foreach(Licitacao::getFiveLicitacoes('LIMIT 5') as $dados){
                        extract($dados);
				?>
                <li>  
                    <div class="news-item-date">
                        <span class="news-item-day"><?php echo $dia; ?></span> <span class="news-item-month"><?php echo $mes; ?></span>
                    </div>
                    <div class="news-item-detail">
                        <a href="licitacao-view/<?php echo $pasta.'/'.$id; ?>" class="news-item-title"><?php echo utf8_encode($tipo_edital); ?></a>
                        <p class="news-item-preview"><?php echo $descricao; ?></p>
                    </div> 
                </li>
                <?php } ?>          
                </ul>
            </div>
        </div>
    </div>        
</div>