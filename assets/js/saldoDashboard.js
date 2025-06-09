document.addEventListener('DOMContentLoaded', () => {
    const saldoValor = document.getElementById('saldo-valor');

    fetch('../controller/SaldoController.php')
        .then(response => {
            if (!response.ok) throw new Error('Error al obtener saldo');
            return response.json();
        })
        .then(data => {
            if (data.saldo !== undefined) {
                saldoValor.textContent = `S/ ${data.saldo.toFixed(2)}`;
            } else {
                saldoValor.textContent = 'Error al cargar saldo';
            }
        })
        .catch(() => {
            saldoValor.textContent = 'Error al cargar saldo';
        });
});