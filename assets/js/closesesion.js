function cerrarSesion() {
    try {
        fetch('./logout.php', {
            method: 'POST'
        });
        // 3. Redirigir al login o a página de inicio
        window.location.href = './index.php';
    }
    catch (error) {
        console.error("Error al actualizar estados o cerrar sesión:", error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo cerrar sesión correctamente.'
        });
    }
}

let isNavigatingInternally = false;

// Detectar navegación interna al hacer clic en enlaces
document.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', function () {
        isNavigatingInternally = true;
        setTimeout(() => isNavigatingInternally = false, 1000); // Resetear después de 1 segundo
    });
});

setInterval(() => {
    fetch('./actualizar_actividad.php', { method: 'POST' })
        .catch(err => console.error('Error al actualizar la actividad:', err));
}, 60000); // Cada 60 segundos

