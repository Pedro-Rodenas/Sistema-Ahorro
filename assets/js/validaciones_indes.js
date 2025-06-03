document.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const msg = params.get('msg');

    if (msg) {
        let title = '';
        let icon = '';

        switch (msg) {
            case 'login_error':
                title = 'Credenciales incorrectas';
                icon = 'error';
                break;
            case 'registro_ok':
                title = 'Registro exitoso';
                icon = 'success';
                break;
            case 'registro_error':
                title = 'Error al registrar';
                icon = 'error';
                break;
            case 'registro_incompleto':
                title = 'Completa todos los campos';
                icon = 'warning';
                break;
        }

        Swal.fire({
            title: title,
            icon: icon,
            confirmButtonText: 'OK',
        });

        window.history.replaceState({}, document.title, window.location.pathname);
    }
});
