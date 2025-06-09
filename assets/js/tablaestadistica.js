document.addEventListener('DOMContentLoaded', () => {
    fetch('../controller/EstadisticasController.php')
        .then(res => res.json())
        .then(data => {
            // data = [{ mes: "2025-01", ingreso: 1500, egreso: 1200 }, ...]

            const categories = data.map(d => {
                const [year, month] = d.mes.split('-');
                const date = new Date(year, month - 1);
                return date.toLocaleString('es-PE', { month: 'short', year: 'numeric' });
            });

            const ingresos = data.map(d => d.ingreso);
            const egresos = data.map(d => d.egreso);

            const options = {
                chart: {
                    type: 'line',
                    height: 300,
                    toolbar: { show: false },
                    zoom: { enabled: false },
                    background: 'transparent', // transparente para que encaje con el fondo
                },
                series: [
                    { name: 'Ingresos', data: ingresos },
                    { name: 'Egresos', data: egresos },
                ],
                colors: ['#D4AF37', '#2B2D6E'], // dorado y azul oscuro (menos agresivo que rojo)
                stroke: {
                    curve: 'smooth',
                    width: 4,
                    dashArray: [0, 6], // línea sólida para ingresos, línea punteada para egresos
                },
                markers: {
                    size: 6,
                    colors: ['#D4AF37', '#2B2D6E'],
                    strokeColors: '#fff',
                    strokeWidth: 2,
                    hover: {
                        size: 8,
                    },
                },
                grid: {
                    borderColor: '#e0e0e0',
                    strokeDashArray: 4,
                    padding: {
                        left: 10,
                        right: 10,
                        top: 10,
                        bottom: 0,
                    },
                },
                xaxis: {
                    categories,
                    labels: {
                        style: {
                            colors: '#6E7582', // gris azulado, suave para los labels
                            fontWeight: '600',
                            fontSize: '13px',
                        },
                    },
                    axisBorder: {
                        show: true,
                        color: '#ccc',
                    },
                    axisTicks: {
                        show: true,
                        color: '#ccc',
                    },
                    tooltip: {
                        enabled: false,
                    },
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#6E7582',
                            fontWeight: '600',
                            fontSize: '13px',
                        },
                    },
                    min: 0,
                    tickAmount: 5,
                },
                tooltip: {
                    theme: 'light',
                    marker: {
                        show: true,
                    },
                    y: {
                        formatter: val => `S/ ${val.toFixed(2)}`,
                    },
                },
                legend: {
                    show: true,
                    position: 'top',
                    horizontalAlign: 'right',
                    labels: {
                        colors: '#444',
                        useSeriesColors: true,
                        fontWeight: '600',
                    },
                    markers: {
                        width: 12,
                        height: 12,
                        radius: 3,
                    },
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.05,
                        stops: [0, 90, 100],
                    },
                },
            };

            const chart = new ApexCharts(document.querySelector('#grafico-ingresos-egresos'), options);
            chart.render();
        })
        .catch(err => {
            console.error('Error al cargar datos del gráfico:', err);
        });
});
