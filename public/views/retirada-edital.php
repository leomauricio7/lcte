<div class="row">
  <div class="span12">
    <div class="widget ">
      <div class="widget-header">
        <i class="icon-folder-open"></i>
        <h3>Retirada do Edital</h3>
      </div> <!-- /widget-header -->
      <div class="widget-content">
        <div class="alert alert-success">       
          <strong>ATENÇÃO: </strong>Cadastro feito com sucesso!</p> 
        </div>  
        <div class="alert alert-info">
          <strong>Atenção:</strong> Faça o Download apenas do Edital solicitado no cadastro.
        </div>
        <p>&nbsp;</p>     
        <?php
          $edital = Licitacao::getFindOneLicitacao(Url::getURL(1));                   
        ?>         
        <form id="edit-profile" class="form-horizontal">
          <fieldset style="border: 1px solid #e8e8e8;padding: 10px;">
            
            <div class="control-group">                     
              <label class="control-label" for="username">Modalidade</label>
              <div class="controls">
                <strong><?php echo $edital[0]['tipo_edital']; ?></strong>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->

            <div class="control-group">                     
              <label class="control-label" for="username">Objeto/Finalidade</label>
              <div class="controls">
                <strong><?php echo $edital[0]['descricao'] ?></strong>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->                    
            
            <div class="control-group">                     
              <label class="control-label" for="firstname">Baixe o Edital</label>
              <div class="controls">
                <a 
                class="btn btn-small"
                href="<?php echo Url::getBase().'backoffice/cpanel/arquivos/editais/'.$edital[0]['ano'].'/'.$edital[0]['pasta'].'/'.$edital[0]['id'].'/'.$edital[0]['link_edital']; ?>"
                target="_blank">
                <i class="icon-download-alt"></i> Download</a>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->

          </fieldset>
        </form>                                                       
      </div> <!-- /widget-content -->   
    </div> <!-- /widget -->      
  </div> <!-- /span8 -->        
</div><!-- /row --> 