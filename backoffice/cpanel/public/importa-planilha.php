<?php if(Validation::verificaPermisao($tipoUser, $url)){ ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page">Início</li>
        <li class="breadcrumb-item" aria-current="page">Importar</li>
        <li class="breadcrumb-item active" aria-current="page">Planilha Excel</li>
    </ol>
</nav>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Importa Planilha Excel</h1>
</div>

<form class="form-inline" method="POST" action="" enctype="multipart/form-data">
    <div class="form-group mb-2">
        <label for="staticEmail2">Selecione a Planilha</label>
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <input type="file" name="arquivo" class="form-control-file" required/>
    </div>
    <button class="btn btn-sm btn-outline-secondary mb-2" type="submit">
        <span data-feather="share"></span>
        Importa Planilha
    </button>
</form>
<?php 
 }else{
    require_once('403.php');   
}
