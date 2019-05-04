
<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

session_start();
$host = $_SERVER['HTTP_HOST'];
define('DOMAIN', $host);
if($host == 'localhost'){
    //dev
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('BD', 'lcte');
}else{
    //prod
    define('HOST', 'localhost');
    define('USER', 'cearamir_admin');
    define('PASS', 'CearaPM@2017');
    define('BD', 'cearamir_pdc');
}
