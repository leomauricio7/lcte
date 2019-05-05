<?php
    //VERIFICA A PAGINA ANTERIOR E PROXIMO
    $pagina_anterior =  $pagina - 1;
    $pagina_proximo = $pagina + 1;
?>
<nav class="text-center">
    <ul class="pagination">
        <li>
        <?php
        //SETANDO PAGINA ANTERIOR
            if($pagina_anterior != 0){ ?>
                <a href="<?php echo Url::getBase().'licitacao/'.Url::getURL(1).'&pagina='.$pagina_anterior ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            <?php }else{ ?>
                    <span aria-hidden="true">&laquo;</span>
            <?php } ?>
        </li> 
        
        <?php 
        //APRESENTAR A PAGINAÇÃO
            for($i = 1; $i < $num_pagina + 1; $i++){ ?>
                <li><a  href="<?php echo Url::getBase().'licitacao/'.Url::getURL(1).'&pagina='.$i ?>"><?php echo $i ?></a></li>
                <?php } ?>
        
        <li>
        <?php
        //SETANDO PAGINA PROXIMO
            if($pagina_proximo <= $num_pagina){ ?>
                <a href="<?php echo Url::getBase().'licitacao/'.Url::getURL(1).'&pagina='.$pagina_proximo ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            <?php }else{ ?>
                    <span aria-hidden="true">&raquo;</span>
            <?php } ?>
        </li> 

        
    </ul>
</nav>