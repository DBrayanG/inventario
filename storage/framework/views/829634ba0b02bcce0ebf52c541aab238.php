<div class="row w-100">
    <script src="https://www.gstatic.com/charts/loader.js"></script>

    <div id="GraficoOperaciones" style="width:100%; max-width:500px; height:400px;" ></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Convertir la variable PHP $operaciones a JSON
            const operaciones = <?php echo json_encode($entradas, 15, 512) ?>;

            // Cargar Google Charts
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                // Convertir los datos de $operaciones al formato adecuado para Google Charts
                const data = new google.visualization.DataTable();
                data.addColumn('string', 'Fecha');
                data.addColumn('number', 'Cantidad');
                operaciones.forEach(operacion => {
                    data.addRow([operacion.fecha, operacion.cantidad]);
                });

                const options = {
                    title: 'ENTRADAS',
                     hAxis: {
                        title: 'Fecha'
                    },
                    vAxis: {
                        title: 'Cantidad'
                    },
                    legend: 'true',
                    backgroundColor: {
                        fill: 'transparent'
                    },
                };
                // Dibujar el gráfico
                const chart = new google.visualization.LineChart(document.getElementById('GraficoOperaciones'));
                chart.draw(data, options);
            }
        });
    </script>
</div>
<?php /**PATH E:\2-2024\Taller\inventario\resources\views/livewire/estadisticas/linea-tiempo-entrada.blade.php ENDPATH**/ ?>