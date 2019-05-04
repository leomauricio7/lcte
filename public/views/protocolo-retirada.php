<?php $edital = Licitacao::getFindOneLicitacao(Url::getURL(1)) ?>
<div class="row">
  <div class="span12">  
  <?php
    if($_POST){
      $dados = Validation::limpaDados(filter_input_array(INPUT_POST, FILTER_DEFAULT));
      if(Email::sendMailAntigo($dados)){
        echo "<script language='javascript'>window.location = '".Url::getBase()."retirada-edital/".Url::getURL(1)."';</script>";
      }else{
        echo '<div class="alert alert-danger" role="alert"><strong>ERROR:</strong> Email não foi enviado.</div>';
      }
    }
  ?>       
    <div class="widget ">        
      <div class="widget-header">
          <i class="icon-user"></i>
          <h3>Protocolo de Retirada do Edital</h3>
      </div> <!-- /widget-header -->
      <div class="widget-content">      
        <form id="form-protocolo" class="form-horizontal" method="POST">
          <fieldset>
            <div class="control-group">                     
              <label class="control-label" for="username">Edital Solicitado</label>
              <div class="controls">
                <input type="text" name="edital" readonly class="span8" id="username" value="<?php echo $edital[0]['descricao']; ?>">
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->
            
            <div class="control-group">                     
              <label class="control-label" for="firstname">Nome da Empresa</label>
              <div class="controls">
                <input type="text" class="span6" id="firstname" name="empresa" required>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->
            
            <div class="control-group">                     
              <label class="control-label" for="lastname">CNPJ</label>
              <div class="controls">
                <input 
                type="text"
                class="span6"
                name="cnpj"
                id="cnpj"
                data-toggle="cnpj"
                title="Atenção"
                data-content="Informe um CNPJ válido."
                required>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->
   
            <div class="control-group">                     
              <label class="control-label">Endereço</label>
              <div class="controls">
                <input type="text" class="span4" name="endereco" required>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->

            <div class="control-group">                     
              <label class="control-label">Responsável</label>
              <div class="controls">
                <input type="text" class="span4" name="nome" required>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->   

            <div class="control-group">                     
              <label class="control-label" for="email">E-mail</label>
              <div class="controls">
                <input type="email" class="span4" name="email" required>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->         

            <div class="control-group">                     
              <label class="control-label">Telefone Fixo</label>
              <div class="controls">
                <input type="text" class="span4 phone" name="phonefixo" placeholder="" required>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->    

            <div class="control-group">                     
              <label class="control-label">Telefone Celular</label>
              <div class="controls">
                <input type="text" class="span4 phone" name="phonecel" required>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->          

            <div class="control-group">                     
              <label class="control-label">&nbsp;</label>
              <div class="controls">
                <button type="submit" class="btn btn-primary">Enviar</button> 
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->                                     

            <div class="form-actions" style="text-align: justify;">
              <p>
                Fica a Empresa acima identificada, convidada a participar do Processo Licitatório na modalidade <?php echo $edital[0]['tipo_edital']; ?> <?php echo $edital[0]['lei']; ?>.
              </p>
              <p>
                1 - Finalidade: <?php echo $edital[0]['descricao']; ?>.
              </p>
              <p>
                2 - Da entrega dos Envelopes: Os envelopes deverão ser entregues na sala da Comissão Permanente de Licitações – CPL, situada a Rua Heráclito Vilar, 697 – 1º Andar – Centro - Ceará-Mirim/RN, até as <?php echo $edital[0]['horaCertame']; ?> horas do dia <?php echo date('d/m/Y', strtotime($edital[0]['dataCertame'])); ?>,quando será iniciado o certame licitatório.
              </p>
            </div>
          </fieldset>
        </form>                                                          
      </div> <!-- /widget-content -->    
    </div> <!-- /widget -->      
  </div> <!-- /span8 -->        
</div><!-- /row --> 