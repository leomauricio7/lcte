<div class="row">
  <div class="span12">   
  <?php
    if($_POST){
      $dados = Validation::limpaDados(filter_input_array(INPUT_POST, FILTER_DEFAULT));
      if(Email::sendMailAntigoFaleCPL($dados)){
        echo '<div class="alert alert-success" role="alert"><strong>Atenção:</strong> Email foi enviado com sucesso.</div>';
      }else{
        echo '<div class="alert alert-danger" role="alert"><strong>ERROR:</strong> Email não foi enviado.</div>';
      }
    }
  ?>       
    <div class="widget ">            
      <div class="widget-header">
        <i class="icon-envelope"></i>
        <h3>Fale com a CPL</h3>
      </div> <!-- /widget-header -->
      <div class="widget-content">                           
        <form class="form-horizontal" method="post" action="">
          <fieldset>                                       
            
            <div class="control-group">                     
              <label class="control-label" for="firstname">Nome</label>
              <div class="controls">
                <input type="text" class="span6" id="firstname" name="nome" placeholder="Nome Completo" required>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->

            <div class="control-group">                     
              <label class="control-label" for="">Assunto</label>
              <div class="controls">
                <input type="text" class="span6" id="" name="assunto" placeholder="Informe o assunto da mensagem" required>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->

            <div class="control-group">                     
              <label class="control-label" for="">Telefone</label>
              <div class="controls">
                <input type="text" class="span6 phone" name="telefone" placeholder="Telefone para contato" required>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->
            
            <div class="control-group">                     
              <label class="control-label" for="email">E-mail</label>
              <div class="controls">
                <input type="email" class="span6" name="email" id="email" placeholder="Digite seu e-mail" required>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->     

            <div class="control-group">                     
              <label class="control-label" for="">Mensagem</label>
              <div class="controls">
                <textarea class="span6" name="msg" 	placeholder="Digite a mensagem" required></textarea>
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->                      

            <div class="control-group">                     
              <label class="control-label" for="email">&nbsp;</label>
              <div class="controls">
                <button type="submit" class="btn btn-primary">Enviar</button> 
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->                                     

            <div class="form-actions" style="text-align: justify;">
              <p>
                <strong>Comissão Permanente de Licitação</strong><br/>
                <i class="icon-map-marker"></i> Rua General João Varela - Centro - Ceará-Mirim-RN<br/> 
                <i class="icon-phone"></i> (84) 3274-5914<br/>
                <i class="icon-envelope"></i> licitacao@cearamirim.rn.gov.br
              </p>
            </div>

          </fieldset>
        </form>                                                          
      </div> <!-- /widget-content -->    
    </div> <!-- /widget -->     
  </div> <!-- /span8 -->           
</div><!-- /row --> 