function cerrarSesion() {
    fetch('./logout.php', { method: 'POST' })
        .then(() => {
            window.location.href = './index.php';
        })
        .catch(err => console.error('Error al cerrar sesión:', err));
}

let isNavigatingInternally = false;

// Detectar navegación interna al hacer clic en enlaces
document.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', function () {
        isNavigatingInternally = true;
        setTimeout(() => isNavigatingInternally = false, 1000); // Resetear después de 1 segundo
    });
});

// Detectar cierre de ventana y enviar solicitud para actualizar el estado
//window.addEventListener("beforeunload", function () {
  //  if (!isNavigatingInternally) {
//        navigator.sendBeacon('./logout.php');
 //   }
//});
setInterval(() => {
    fetch('./actualizar_actividad.php', { method: 'POST' })
        .catch(err => console.error('Error al actualizar la actividad:', err));
}, 60000); // Cada 60 segundos

