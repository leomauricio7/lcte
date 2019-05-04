
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> 
    <a style="color: #fff;float: right;" href="#">Seja bem vindo | <?php echo Data::getDataExtenso(); ?></a>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> 
    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="fa fa-bar"></span><span class="fa fa-bar"></span><span class="fa fa-bar"></span> </a>
    <a class="brand" href="<?php echo Url::getBase() ?>">
      <img src="<?php echo Url::getBase() ?>public/img/logo-icon.png">   
     
    </a> 
    <img src="<?php echo Url::getBase() ?>public/img/logoLCT.png" style="float: right">
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> 
    <a class="brand" href="<?php echo Url::getBase() ?>"><i class="fa fa-shopping-cart"></i>&nbsp;Portal de Compras | Comissão Permanente de Licitação </a>
      <div class="nav-collapse">
        <form class="navbar-search pull-right" method="GET" action="pesquisa-tags">
          <input type="text" name="tag" class="search-query" placeholder="Pesquise no Portal">
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="<?php echo Url::getBase() ?>"><i class="fa fa-home"></i><span>Página Inicial</span> </a> </li>
        <li><a href="http://transparencia.prefeituradecearamirim.com.br/transparencia/despesas.aspx"><i class="fa fa-search"></i><span>Portal da Transparência</span> </a> </li>
        <li><a href="http://transparencia.prefeituradecearamirim.com.br/transparencia/arquivos.aspx?id=lrf"><i class="fa fa-chart-pie"></i><span>Demonstrativos da LRF</span> </a> </li>
        <li><a href="http://186.208.110.76/contracheque/"><i class="fa fa-users"></i><span>Servidores</span> </a> </li>
        <li><a href="http://www.cearamirim.rn.gov.br/portal/leis-municipais"><i class="fa fa-book"></i><span>Leis Municipais</span> </a></li>
        <li><a href="#"><i class="fa fa-comment"></i><span>E-Sic</span> </a></li>
        <li><a href="<?php echo Url::getBase() ?>fale-cpl"><i class="fa fa-envelope"></i><span>Fale com a Comissão</span> </a> </li>
        <li style="background-color: #292929;"><a href="<?php echo Url::getBase() ?>pesquisa-avancada"><i class="fa fa-filter"></i><span>Pesquisa Avançada</span> </a> </li>        
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>