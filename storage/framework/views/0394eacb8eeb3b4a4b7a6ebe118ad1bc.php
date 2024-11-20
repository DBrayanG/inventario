<div class="row w-100">
    <script src="https://www.gstatic.com/charts/loader.js"></script>

    <div id="myChart" style="width:100%; max-width:500px; height:400px;"></div>

    <script>
        // Convertir la variable PHP $categorias a JSON
        const categorias = <?php echo json_encode($categorias, 15, 512) ?>;

        // Cargar Google Charts
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Convertir los datos de $categorias al formato adecuado para Google Charts
            const data = google.visualization.arrayToDataTable([
                ['Categoria', 'Cantidad'],
                ...categorias.map(categoria => [categoria.nombre, categoria.cantidad])
            ]);

            const options = {
                title: 'Categorias',
                is3D: true,
                backgroundColor: {
                    fill: 'transparent'
                },
                
            };

            // Dibujar el gráfico
            const chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);

            // Mostrar en consola
            console.log(categorias);
        }
    </script>
</div><?php /**PATH D:\SEMESTRE_1_2024\TALLER_DE_GRADO_1\taller_grado\resources\views/livewire/estadisticas/tortas.blade.php ENDPATH**/ ?>