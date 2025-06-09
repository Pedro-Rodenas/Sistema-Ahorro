document.addEventListener('DOMContentLoaded', () => {
    const selectCategoria = document.getElementById('categoria');
    const tipoSelect = document.getElementById('tipo');

    function cargarCategorias(tipo) {
        fetch(`../controller/CategoriaController.php?tipo=${tipo}`)
            .then(response => response.json())
            .then(data => {
                selectCategoria.innerHTML = '';
                data.forEach(cat => {
                    const option = document.createElement('option');
                    option.value = cat.id;
                    option.textContent = cat.nombre;
                    selectCategoria.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error cargando categorías:', error);
            });
    }

    cargarCategorias(tipoSelect.value);

    tipoSelect.addEventListener('change', () => {
        cargarCategorias(tipoSelect.value);
    });
});
