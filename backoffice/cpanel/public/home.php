<?php if(Validation::verificaPermisao($tipoUser, 'home')){ ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Página Inicial</li>
    </ol>
</nav>
<div class="row">
    <div class="col">
         <div id="columnchart_values" style="width:300px; height: 300px;"></div>
    </div>
    <div class="col">
      <div id="piechart_3d" style="width: 600px; height: 500px;"></div>
    </div>
</div>
<!-- Graphs -->
<script src="<?php echo Url::getBase() . '../js/chart.min.js'; ?>"></script>
<script type="text/javascript">
    google.charts.load("current", {packages: ["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Pregão Presencial', <?php echo Validation::getTotalEditais(3); ?>],
            ['Chamada Pública', <?php echo Validation::getTotalEditais(2); ?>],
            ['Carta Convite', <?php echo Validation::getTotalEditais(1); ?>],
            ['Tomada de Preço', <?php echo Validation::getTotalEditais(4); ?>],
            ['Adesão Carona', <?php echo Validation::getTotalEditais(6); ?>],
            ['Inexigibilidade', <?php echo Validation::getTotalEditais(5); ?>]
        ]);

        var options = {
            title: 'Processos licitatórios publicados',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>
<script type="text/javascript">
    google.charts.load("current", {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Element", "Quantidade", {role: "style"}],
            ["Pregão P.", <?php echo Validation::getTotalEditais(3,true); ?>, "#b87333"],
            ["Adesão/Carona", <?php echo Validation::getTotalEditais(6,true); ?>, "silver"],
            ["Chamada P.", <?php echo Validation::getTotalEditais(2,true); ?>, "gold"],
            ["Tomada de P.", <?php echo Validation::getTotalEditais(4,true); ?>, "green"],
            ["Carta C.", <?php echo Validation::getTotalEditais(1,true); ?>, "color: #e5e4e2"],
            ["Inexigibilidade", <?php echo Validation::getTotalEditais(5,true); ?>, "color: #0099c6"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"},
            2]);

        var options = {
            title: "Processos licitatórios em aberto",
            width: 600,
            height: 400,
            bar: {groupWidth: "95%"},
            legend: {position: "none"},
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
</script>
<?php 
 }else{
    require_once('403.php');   
}