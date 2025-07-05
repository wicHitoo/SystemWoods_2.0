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
// window.addEventListener("beforeunload", function (e) {
//   if (!isNavigatingInternally) {
//     navigator.sendBeacon('./logout.php', JSON.stringify({ logout: true }));
//   }
// });


setInterval(() => {
  fetch('./actualizar_actividad.php', { method: 'POST' })
    .catch(err => console.error('Error al actualizar la actividad:', err));
}, 60000); // Cada 60 segundos


document.getElementById('miFormulario').addEventListener('submit', function (event) {
  isNavigatingInternally = true;
  setTimeout(() => isNavigatingInternally = false, 1000);
  event.preventDefault(); // Prevenir el envío tradicional del formulario

  let formData = new FormData(this);

  // Concatenar el código del país al número de teléfono
  const pais = document.getElementById('pais').value;
  const telefono = document.getElementById('telefono').value;
  formData.set('telefono', pais + telefono);

  fetch('./bd/insertar.php', {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      if (data.mensaje) {
        // Mostrar mensaje de éxito con SweetAlert2
        Swal.fire({
          icon: 'success',
          title: '¡Éxito!',
          text: data.mensaje,
          confirmButtonText: 'Aceptar',
          customClass: {
            confirmButton: 'btn btn-success'
          },
          buttonsStyling: false
        });
        // Limpiar el formulario
        document.getElementById('miFormulario').reset();
      } else if (data.error) {
        // Mostrar mensaje de error con SweetAlert2
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: data.error,
          confirmButtonText: 'Aceptar',
          customClass: {
            confirmButton: 'btn btn-danger'
          },
          buttonsStyling: false
        });
      }
    })
    .catch(error => {
      console.error('Error:', error);
      Swal.fire({
        icon: 'error',
        title: 'Error de conexión',
        text: 'No se pudo conectar con el servidor.',
        confirmButtonText: 'Aceptar',
        customClass: {
          confirmButton: 'btn btn-danger'
        },
        buttonsStyling: false
      });
    });
});

document.getElementById('pais').addEventListener('change', function () {
  const selectedOption = this.options[this.selectedIndex];
  const codigoPais = selectedOption.value.split(' ')[0]; // Obtiene solo el código del país
  document.getElementById('codigoPais').value = codigoPais; // Almacena el código del país en un campo oculto

  // Actualiza el placeholder del campo de teléfono para incluir el código del país con un espacio
  const telefonoInput = document.getElementById('telefono');
  telefonoInput.placeholder = codigoPais + " " + "Introduce el número de teléfono";

  // Si ya hay un número ingresado, lo concatena con el código del país asegurando un espacio
  if (telefonoInput.value) {
    telefonoInput.value = codigoPais + " " + telefonoInput.value.replace(/^\+\d+\s*/, '');
  }
});




function togglePassword() {
  const passwordField = document.getElementById('contraSystem');
  const toggleBtn = document.getElementById('toggleBtn');

  if (passwordField.type === "password") {
    passwordField.type = "text";
    toggleBtn.textContent = "🙈"; // Cambia el icono
  } else {
    passwordField.type = "password";
    toggleBtn.textContent = "👁️";
  }
}


async function editModel(id) {
  try {
    // Solicita los datos del modelo al servidor
    const response = await fetch(`./bd/buscar_modelos.php?id=${id}&nocache=${new Date().getTime()}`);
    if (!response.ok) throw new Error('Error al obtener los datos del modelo');
    const data = await response.json();

    // Muestra el formulario en el SweetAlert
    Swal.fire({
      title: 'Modificar Modelo',
      html: `
        <form id="updateForm">
          <div class="mb-3">
            <label for="Nombre" class="form-label">Modelo</label>
            <input type="text" id="Nombre" name="Nombre" class="form-control" value="${data.Nombre}">
          </div>
          <div class="mb-3">
            <label for="Premium" class="form-label">Premium</label>
            <select class="form-select" id="Premium" name="Premium" required>
              <option value="" disabled>Selecciona una opción</option>
              <option value="1" ${data.Premium == 1 ? 'selected' : ''}>Sí</option>
              <option value="0" ${data.Premium == 0 ? 'selected' : ''}>No</option>
            </select>
          </div>
          <input type="hidden" name="id" value="${id}">
        </form>
      `,
      focusConfirm: false,
      showCancelButton: true,
      confirmButtonText: 'Guardar',
      cancelButtonText: 'Cancelar',
      customClass: {
        popup: 'custom-popup',
        title: 'custom-title',
        htmlContainer: 'custom-html',
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      preConfirm: async () => {
        const form = document.getElementById('updateForm');
        const formData = new FormData(form);

        // Envía los datos al servidor
        const updateResponse = await fetch('./bd/actualizar_modelos.php', {
          method: 'POST',
          body: formData
        });

        if (!updateResponse.ok) {
          Swal.showValidationMessage('Error al actualizar el modelo');
          return false;
        }

        const updateResult = await updateResponse.json();
        if (updateResult.success) {
          return true;
        } else {
          Swal.showValidationMessage(updateResult.message || 'Error desconocido');
          return false;
        }
      }
    }).then(result => {
      if (result.isConfirmed) {
        Swal.fire('¡Guardado!', 'El modelo ha sido actualizado correctamente.', 'success').then(() => {
          // Recarga la página
          location.reload();
        });
      }
    });
  } catch (error) {
    console.error(error);
    Swal.fire('Error', 'No se pudieron obtener los datos del modelo.', 'error');
  }
}



async function editUser(id) {
  try {
    // Solicita los datos del modelo al servidor
   const response = await fetch(`./bd/buscar_usuarios.php?id=${id}&nocache=${new Date().getTime()}`);
    if (!response.ok) throw new Error('Error al obtener los datos del modelo');
    const data = await response.json();

    // Muestra el formulario en el SweetAlert
    Swal.fire({
      title: 'Modificar Usuario',
      html: `
        <form id="updateFormUser">
          <div class="mb-3">
            <label for="correo" class="form-label">Correo Electrónico</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-envelope"></i></span>
              <input type="email" class="form-control" id="correo" name="correo" value="${data.correo}" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="contraSystem" class="form-label">Contraseña</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock"></i></span>
              <input type="password" class="form-control" id="contraSystem" name="contraSystem" value="${data.contraSystem}" required>
              <button type="button" class="btn btn-outline-secondary toggle-btn" onclick="togglePassword()" id="toggleBtn" style="max-width: 40px;">
                👁️
              </button>
            </div>
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-telephone"></i></span>
              <input type="tel" class="form-control" id="telefono" name="telefono" value="${data.telefono}" required>
            </div>
          </div>
          <input type="hidden" name="id" value="${id}">
        </form>
      `,
      focusConfirm: false,
      showCancelButton: true,
      confirmButtonText: 'Guardar',
      cancelButtonText: 'Cancelar',
      customClass: {
        popup: 'custom-popup',
        title: 'custom-title',
        htmlContainer: 'custom-html',
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      preConfirm: async () => {
        const form = document.getElementById('updateFormUser');
        const formData = new FormData(form);

        // Envía los datos al servidor
        const updateResponse = await fetch('./bd/updateUsuarios.php', {
          method: 'POST',
          body: formData
        });

        if (!updateResponse.ok) {
          Swal.showValidationMessage('Error al actualizar el Usuario');
          return false;
        }

        const updateResult = await updateResponse.json();
        if (updateResult.success) {
          return true;
        } else {
          Swal.showValidationMessage(updateResult.message || 'Error desconocido');
          return false;
        }
      }
    }).then(result => {
      if (result.isConfirmed) {
        Swal.fire('¡Guardado!', 'El Usuario se ha actualizado correctamente.', 'success');
        location.reload();
      }
    });
  } catch (error) {
    console.error(error);
    Swal.fire('Error', 'No se pudieron obtener los datos del USUARIO.', 'error');
  }
}




async function editMarcas(id) {
  try {
    // Solicita los datos del modelo al servidor
    const response = await fetch(`./bd/buscar_marcas.php?id=${id}&nocache=${new Date().getTime()}`);
    if (!response.ok) throw new Error('Error al obtener los datos del modelo');
    const data = await response.json();

    // Muestra el formulario en el SweetAlert
    Swal.fire({
      title: 'Modificar Marca',
      html: `
        <form id="updateFormMarcas">
          <div class="mb-3">
            <label for="Nombre" class="form-label">Nuevo nombre de la marca</label>
            <div class="input-group">
              
              <input type="email" class="form-control" id="Nombre" name="Nombre" value="${data.Nombre}" required>
            </div>
          </div>
        
          
          <input type="hidden" name="id" value="${id}">
        </form>
      `,
      focusConfirm: false,
      showCancelButton: true,
      confirmButtonText: 'Guardar',
      cancelButtonText: 'Cancelar',
      customClass: {
        popup: 'custom-popup',
        title: 'custom-title',
        htmlContainer: 'custom-html',
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      preConfirm: async () => {
        const form = document.getElementById('updateFormMarcas');
        const formData = new FormData(form);

        // Envía los datos al servidor
        const updateResponse = await fetch('./bd/actualizar_marca.php', {
          method: 'POST',
          body: formData
        });

        if (!updateResponse.ok) {
          Swal.showValidationMessage('Error al actualizar el MARCA');
          return false;
        }

        const updateResult = await updateResponse.json();
        if (updateResult.success) {
          return true;
        } else {
          Swal.showValidationMessage(updateResult.message || 'Error desconocido');
          return false;
        }
      }
    }).then(result => {
      if (result.isConfirmed) {
        Swal.fire('¡Guardado!', 'La Marca se ha actualizado correctamente.', 'success');
        location.reload();
      }
    });
  } catch (error) {
    console.error(error);
    Swal.fire('Error', 'No se pudieron obtener los datos del MARCA.', 'error');
  }
}





function abrirFormularioModelo(marcaId) {
  Swal.fire({
    title: 'Agregar Modelo',
    html: `
      <form id="formInsertarModelo">
        <div class="mb-3">
          <label for="Nombre" class="form-label">Nombre del Modelo</label>
          <input type="text" id="Nombre" name="Nombre" class="form-control" required>
        </div>
        <input type="hidden" id="MarcaID" name="MarcaID" value="${marcaId}">
        <div class="mb-3">
          <label for="Premium" class="form-label">Premium</label>
          <select id="Premium" name="Premium" class="form-select" required>
            <option value="" disabled selected>Selecciona una opción</option>
            <option value="1">Sí</option>
            <option value="0">No</option>
          </select>
        </div>
      </form>
    `,
    focusConfirm: false,
    showCancelButton: true,
    confirmButtonText: 'Guardar',
    cancelButtonText: 'Cancelar',
    customClass: {
      popup: 'custom-popup',
      title: 'custom-title',
      htmlContainer: 'custom-html',
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    preConfirm: () => {
      const form = document.getElementById('formInsertarModelo');
      const formData = new FormData(form);

      // Validar los campos del formulario
      if (!formData.get('Nombre') || formData.get('Premium') === null) {
        Swal.showValidationMessage('Todos los campos son obligatorios');
        return false;
      }

      // Enviar datos al servidor
      return fetch('./bd/insertar_modelos.php', {
        method: 'POST',
        body: formData
      })
        .then(response => {
          if (!response.ok) {
            throw new Error('Error al insertar el modelo');
          }
          return response.json();
        })
        .then(data => {
          if (data.success) {
            return true;
          } else {
            Swal.showValidationMessage(data.message || 'Error desconocido');
            return false;
          }
        })
        .catch(error => {
          Swal.showValidationMessage('Error al conectar con el servidor');
          return false;
        });
    }
  }).then(result => {
    if (result.isConfirmed) {
      Swal.fire('¡Guardado!', 'El modelo se ha insertado correctamente.', 'success');
      window.location.reload();
    }
  });
}



function insertarMarca() {
  Swal.fire({
    title: 'Agregar una marca',
    html: `
      <form id="formInsertarMarca">
        <div class="mb-3">
          <label for="Nombre" class="form-label">Nombre del marca</label>
          <input type="text" id="Nombre" name="Nombre" class="form-control" required>
        </div>
      </form>
    `,
    focusConfirm: false,
    showCancelButton: true,
    confirmButtonText: 'Guardar',
    cancelButtonText: 'Cancelar',
    customClass: {
      popup: 'custom-popup',
      title: 'custom-title',
      htmlContainer: 'custom-html',
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    preConfirm: () => {
      const form = document.getElementById('formInsertarMarca');
      const formData = new FormData(form);

      // Validar los campos del formulario
      if (!formData.get('Nombre') === null) {
        Swal.showValidationMessage('Todos los campos son obligatorios');
        return false;
      }

      // Enviar datos al servidor
      return fetch('./bd/insertar_marcas.php', {
        method: 'POST',
        body: formData
      })
        .then(response => {
          if (!response.ok) {
            throw new Error('Error al insertar la marca');
          }
          return response.json();
        })
        .then(data => {
          if (data.success) {
            return true;
          } else {
            Swal.showValidationMessage(data.message || 'Error desconocido');
            return false;
          }
        })
        .catch(error => {
          Swal.showValidationMessage('Error al conectar con el servidor');
          return false;
        });
    }
  }).then(result => {
    if (result.isConfirmed) {
      Swal.fire('¡Guardado!', 'La marca se ha insertado correctamente.', 'success');
      location.reload();
    }
  });
}




async function eliminarUsuario(id) {
  try {
    // Solicita los datos del modelo al servidor
    const response = await fetch(`./bd/buscar_usuarios.php?id=${id}`);
    if (!response.ok) throw new Error('Error al obtener los datos del modelo');
    const data = await response.json();

    // Muestra el formulario en el SweetAlert
    Swal.fire({
      title: 'Eliminar Usuario',
      html: `
        <form id="deleteUser">
          <div class="mb-3">
            <p><label for="correo" class="form-label">Deseas eliminar el correo  <span>${data.correo}</span></label></p>
            
          </div>
          <input type="hidden" name="id" value="${id}">
        </form>
      `,
      focusConfirm: false,
      showCancelButton: true,
      confirmButtonText: '✓',
      cancelButtonText: '✕',
      customClass: {
        popup: 'custom-popup',
        title: 'custom-title',
        htmlContainer: 'custom-html',
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      preConfirm: async () => {
        const form = document.getElementById('deleteUser');
        const formData = new FormData(form);

        // Envía los datos al servidor
        const updateResponse = await fetch('./bd/eliminarUsuarios.php', {
          method: 'POST',
          body: formData
        });

        if (!updateResponse.ok) {
          Swal.showValidationMessage('Error al eliminar el Usuario');
          return false;
        }

        const updateResult = await updateResponse.json();
        if (updateResult.success) {
          return true;
        } else {
          Swal.showValidationMessage(updateResult.message || 'Error desconocido');
          return false;
        }
      }
    }).then(result => {
      if (result.isConfirmed) {
        Swal.fire('¡Guardado!', 'El usuario ha sido eliminado.', 'success');
        window.location.reload();
      }
    });
  } catch (error) {
    console.error(error);
    Swal.fire('Error', 'No se pudieron obtener los datos del USUARIO.', 'error');
  }
}


