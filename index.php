<?php 
  require_once('./backoffice/cpanel/app/Conf.php');
  require_once('./backoffice/cpanel/vendor/autoload.php');
  //Validation::ForceHTTPS();
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>LCT-e - Versão 1.0.1</title>
<link rel="icon" type="image/png" href="img/favicon.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="<?php echo Url::getBase()?>public/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo Url::getBase()?>public/css/bootstrap-responsive.min.css" rel="stylesheet">
<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link href="<?php echo Url::getBase()?>public/css/style.css" rel="stylesheet">
<link href="<?php echo Url::getBase()?>public/css/pages/dashboard.css" rel="stylesheet">

</head>
<body>
  <?php require_once "./public/views/topo.php"; ?>
  <div class="main">
    <div class="main-inner">
      <div class="container">
        <?php
          $pagina = Url::getURL(0);
          if ($pagina == null):
              $pagina = "home";
          endif;
          if (file_exists("public/views/" . $pagina . ".php")):
              require "public/views/" . $pagina . ".php";
          else:
              require "public/views/404.php";
          endif;
        ?>
      </div>
    </div>
  </div>
  <!-- /extra -->
  <?php require_once "./public/views/rodape.php"; ?>
  <!-- Le javascript
  ================================================== --> 
  <!-- Placed at the end of the document so the pages load faster --> 
  <script src="<?php echo Url::getBase()?>public/js/jquery-1.7.2.min.js"></script> 
  <script src="<?php echo Url::getBase()?>public/js/excanvas.min.js"></script> 
  <script src="<?php echo Url::getBase()?>public/js/chart.min.js" type="text/javascript"></script> 
  <script src="<?php echo Url::getBase()?>public/js/bootstrap.js"></script> 
  <script src="<?php echo Url::getBase()?>public/js/base.js"></script> 
  <script src="<?php echo Url::getBase()?>public/js/validation.js"></script> 
  <!-- <script src="<?php echo Url::getBase()?>public/js/jquery-1.2.6.pack.js" type="text/javascript"></script> -->
  <script src="<?php echo Url::getBase()?>public/js/jquery.maskedinput-1.1.4.pack.js" type="text/javascript" /></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){	
      $('.table-sort').DataTable({
        "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando de _START_ até _END_ do total de _TOTAL_ licitações - página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "loadingRecords": "Carregando...",
                "processing":     "Processando...",
                "search":         "Buscar:",
                "paginate": {
                    "first":      "First",
                    "last":       "Last",
                    "next":       "Proximo",
                    "previous":   "Anterior"
                },
                "aria": {
                    "sortAscending":  ": ativado ordenação ascendente",
                    "sortDescending": ": ativado ordenação descendente"
                },
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
      });
      $("#cnpj").mask("99.999.999/9999-99");
      $(".phone").mask("(99) 99999-9999");
    });
  </script>
</body>
</html>
