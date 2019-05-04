<?php if(Validation::verificaPermisao($tipoUser, $url)){ ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page">Início</li>
        <li class="breadcrumb-item" aria-current="page">Exportar</li>
        <li class="breadcrumb-item active" aria-current="page">Banco</li>
    </ol>
</nav>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Exportar Base de Dados</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <form class="form-inline" method="POST" action="" enctype="multipart/form-data">
                <button class="btn btn-sm btn-outline-secondary" type="submit">
                    <span data-feather="share"></span>
                    Exportar
                </button>
            </form>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Base</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Responsável</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>62349gusdfgsdfaj.sql</td>
                <td>20/10/2018</td>
                <td>14:50</td>
                <td>Leonardo Maurício</td>
                <td>
                    <a class="btn btn-sm btn-outline-secondary"> <span data-feather="share"></span> Baixar</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php 
 }else{
    require_once('403.php');   
}