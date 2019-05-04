<?php
require_once('./cpanel/app/Conf.php');
require_once('./cpanel/vendor/autoload.php');
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Sistema de Licitação para entidades publicas">
        <meta name="author" content="Leonardo Mauricio - Ltec">
        <link rel="icon" href="<?php echo Url::getBase()?>img/favicon.png">
        <title>LCT-e | Painel Administrativo</title>
        <!-- Bootstrap core CSS -->
        <!-- <link href="<?php echo Url::getBase()?>css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <link href="<?php echo Url::getBase()?>css/floating-labels.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>

    <body>
        <?php
        $pagina = Url::getURL(0);
        if ($pagina == null):
            $pagina = "cpanel-login";
        endif;
        if (file_exists("public/" . $pagina . ".php")):
            require "public/" . $pagina . ".php";
        else:
            require "public/404.php";
        endif;
        ?>
        <!-- <script src="<?php echo Url::getBase() . 'js/jquery.min.js'; ?>" ></script> -->
        <!-- CDN bootstrap-jquery -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- CDN google recaptcha -->
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <!-- função para validas as senhas -->
        <script>
            if($("#password").length) { 
                console.log()
                var password = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");
                function validatePassword() {
                    if (confirm_password.value != '' && password.value != confirm_password.value) {
                        //confirm_password.setCustomValidity("Senhas não coincidem!");
                        $('[data-toggle="info-confirm-senha"]').popover('show')
                    } else {
                        //confirm_password.setCustomValidity('');
                        $('[data-toggle="info-confirm-senha"]').popover('dispose')
                    }
                }

                password.onchange = validatePassword;
                confirm_password.onkeyup = validatePassword;
            }
        </script>
        <script>
            $(function(){
                var senha = $('#senha');
                var olho= $("#olho");

                olho.mousedown(function() {
                senha.attr("type", "text");
                });

                olho.mouseup(function() {
                senha.attr("type", "password");
                });
                // para evitar o problema de arrastar a imagem e a senha continuar exposta, 
                //citada pelo nosso amigo nos comentários
                $( "#olho" ).mouseout(function() { 
                $("#senha").attr("type", "password");
                });

                $('.close').click( (e) => {
                    $('div.alert').hide('slow');
                });

                $('[data-toggle="popover"]').popover({
                    container: 'body',
                    animation: true,
                    html: true
                });

                $('[data-toggle="tooltip"]').tooltip();

                $('#password').mouseover((e)=>{
                     $('[data-toggle="info-senha"]').popover('show')
                }).mouseout((e)=>{
                    $('[data-toggle="info-senha"]').popover('hide')
                });
              
            })
        </script>

    </body>
</html>
