document.addEventListener('DOMContentLoaded', () => {
    const tbody = document.getElementById('historial-body');

    if (!tbody) return;

    fetch('../controller/HistorialController.php')
        .then(response => {
            if (!response.ok) throw new Error('Error al obtener movimientos');
            return response.json();
        })
        .then(data => {
            tbody.innerHTML = ''; // limpiar filas previas

            data.slice(0, 7).forEach(mov => {
                const tr = document.createElement('tr');

                const fecha = new Date(mov.fecha).toLocaleDateString('es-PE', {
                    day: '2-digit',
                    month: 'short',
                    year: 'numeric',
                });

                const tipoCapitalizado = mov.tipo.charAt(0).toUpperCase() + mov.tipo.slice(1);

                tr.innerHTML = `
                    <td class="fecha-movimiento">${fecha}</td>
                    <td>${mov.detalle}</td>
                    <td>${tipoCapitalizado}</td>
                    <td class="${mov.tipo === 'ingreso' ? 'monto-ingreso' : 'monto-egreso'}">
                        S/ ${typeof mov.monto === 'number' ? mov.monto.toFixed(2) : mov.monto}
                    </td>
                `;

                tbody.appendChild(tr);
            });
        })
        .catch(error => {
            tbody.innerHTML = '<tr><td colspan="4">No se pudieron cargar los movimientos.</td></tr>';
            console.error(error);
        });
});
