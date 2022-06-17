<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./router.php?c=dashboard&a=index">Fatura+</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <!-- Inicio conteúdo -->
        <div class="row">
            <div class="col m-3">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?php
                    foreach ($dados as $dia => $valor) {
                        echo "'" . $dia . "',";
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Nº faturas',
                    data: [
                        <?php
                        foreach ($dados as $dia => $valor) {
                            echo $valor . ',';
                        }
                        ?>
                    ],
                    borderColor: 'rgb(0, 191, 255)'
                }]
            },
            options: {
                aspectRatio: 3/1.3,
                maintainAspectRatio: true,
                plugins: {
                  title: {
                      display: true,
                      text: 'Número de Fatura Iniciadas/dia'
                  },
                  legend: {
                    display: false
                  }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
</script>