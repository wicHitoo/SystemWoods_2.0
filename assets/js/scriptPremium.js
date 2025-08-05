document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM cargado correctamente");

  const USER_ID = window.USER_ID || null;

  const generateBtn = document.getElementById('generateBtn');
  const deviceTypeSelect = document.getElementById('deviceType');
  const screenSizeSelect = document.getElementById('screenSize');
  const resultDiv = document.getElementById('result');

  generateBtn.addEventListener('click', generateSensitivities);
  deviceTypeSelect.addEventListener('change', cargarModelosPorMarca);

 function generateSensitivities() {
  const deviceType = deviceTypeSelect.value.trim();
  const screenSize = screenSizeSelect.value.trim();

  if (deviceType === "" || screenSize === "") {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Por favor, selecciona un tipo de dispositivo y un modelo válido.'
    });
    return;
  }

  const generalSensitivity = Math.floor(getRandomNumber(65, 190));
  const redDotSensitivity = Math.floor(getRandomNumber(50, 100));
  const x2ScopeSensitivity = Math.floor(getRandomNumber(55, 130));
  const x4ScopeSensitivity = Math.floor(getRandomNumber(55, 130));
  const buttonSize = Math.floor(getRandomNumber(35, 55));

  let dpiLabel;
  if (deviceTypeSelect.options[deviceTypeSelect.selectedIndex].text === "APPLE") {
    const options = ['Sencillo', 'Preciso', 'Refinado', 'Sin DPI'];
    const chosenOption = options[Math.floor(getRandomNumber(0, options.length))];
    dpiLabel = `<b>${chosenOption}:</b> ${chosenOption === 'Sin DPI' ? '' : Math.floor(getRandomNumber(31, 120))}`;
  } else {
    const dpiOptions = ['400', '450', '500', '550', 'Sin DPI', '600', '650'];
    const chosenDPIOption = dpiOptions[Math.floor(getRandomNumber(0, dpiOptions.length))];
    dpiLabel = `<b>DPI:</b> ${chosenDPIOption}`;
  }

  const resultHTML = `
    <h4><span>${screenSizeSelect.options[screenSizeSelect.selectedIndex].text}</span></h4>
    <b>General:</b> ${generalSensitivity}<br>
    <b>Mira de Punto Rojo:</b> ${redDotSensitivity}<br>
    <b>Mira X2:</b> ${x2ScopeSensitivity}<br>
    <b>Mira X4:</b> ${x4ScopeSensitivity}<br>
    <b>Tamaño del Botón:</b> ${buttonSize}<br>
    ${dpiLabel}
  `;

  resultDiv.innerHTML = resultHTML;
  resultDiv.style.display = 'block';

  const sensibilidadJSON = JSON.stringify({
    general: generalSensitivity,
    punto_rojo: redDotSensitivity,
    mira_x2: x2ScopeSensitivity,
    mira_x4: x4ScopeSensitivity,
    boton: buttonSize,
    dpi: dpiLabel.replace(/<\/?[^>]+(>|$)/g, ""),
    fecha: Date.now()
  });

  fetch('./bd/insertar_sensibilidades.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: new URLSearchParams({
      _modelo: screenSize,
      sensibilidad: sensibilidadJSON
    })
  })
    .then(response => response.json())
    .then(data => {
      console.log("Respuesta del servidor:", data);
      if (data.success) {
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'success',
          title: 'Sensibilidad guardada correctamente',
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
          background: '#f0f0f0',
          color: '#333'
        });
      } else {
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'error',
          title: 'Error al guardar',
          text: 'Se produjo un error al guardar la sensibilidad, seleccione un modelo válido.',
          showConfirmButton: false,
          timer: 2000,
          timerProgressBar: true
        });
      }
    })
    .catch(error => {
      console.error('Error al guardar sensibilidad:', error);
      Swal.fire({
        icon: 'error',
        title: 'Error de red',
        text: 'No se pudo conectar con el servidor'
      });
    });
}


  function cargarModelosPorMarca() {
    const marcaId = deviceTypeSelect.value;

    if (marcaId) {
      fetch(`./bd/get_models_premium.php?marca=${marcaId}`)
        .then(response => response.json())
        .then(data => {
          screenSizeSelect.innerHTML = '<option value="">Selecciona un modelo</option>';
          data.forEach(model => {
            const option = document.createElement('option');
            option.value = model.idmodelocelular;
            option.text = model.Nombre;
            screenSizeSelect.appendChild(option);
          });
        })
        .catch(error => console.error('Error al cargar modelos:', error));
    } else {
      screenSizeSelect.innerHTML = '<option value="">Selecciona un modelo</option>';
    }
  }

  function getRandomNumber(min, max) {
    return Math.random() * (max - min) + min;
  }
});

function verSensibilidades(idUsuario) {
  fetch(`./bd/get_sensi.php?id=${idUsuario}`)
    .then(res => res.json())
    .then(res => {
      if (!res.success) {
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'error',
          title: res.message || 'Error',
          showConfirmButton: false,
          timer: 3000
        });
        return;
      }

      const sensibilidades = res.data;
      if (sensibilidades.length === 0) {
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'info',
          title: 'Este usuario no tiene sensibilidades registradas.',
          showConfirmButton: false,
          timer: 3000
        });
        return;
      }

      let currentPage = 1;
      let itemsPerPage = 9;

      function renderPaginatedContent() {
        const totalPages = Math.ceil(sensibilidades.length / itemsPerPage);
        const start = (currentPage - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const pageItems = sensibilidades.slice(start, end);

        const contentHtml = pageItems.map((s) => {
          const datos = JSON.parse(s.sensibilidad);

          let fechaFormateada = "Sin fecha";
          if (datos.fecha) {
            const fecha = new Date(parseInt(datos.fecha));
            fechaFormateada = fecha.toLocaleString("es-MX", {
              weekday: "long",
              day: "numeric",
              month: "long",
              year: "numeric",
              hour: "2-digit",
              minute: "2-digit"
            });
          }

          return `
          <div class="mb-4 p-3 border rounded bg-white 
        ">
            <h6 class="fw-bold mb-3">
              📱 <span class="text-uppercase text-dark">${s.marca}</span> 
              <span class="text-muted">-  ${s.modelo}</span>
            </h6>
            <div class="table-responsive">
              <table class="table table-sm mb-0" style="font-size: 18px; background-color: #000000ff; color: white;">
                <tbody>
                  ${[
                    { icon: "🎯", label: "General", value: datos.general },
                    { icon: "🔴", label: "Punto Rojo", value: datos.punto_rojo },
                    { icon: "🔭", label: "Mira x2", value: datos.mira_x2 },
                    { icon: "🔬", label: "Mira x4", value: datos.mira_x4 },
                    { icon: "🖱️", label: "Botón", value: datos.boton },
                    { icon: "📐", label: "DPI", value: datos.dpi },
                    { icon: "📅", label: "Fecha", value: fechaFormateada }
                  ].map(item => `
                    <tr>
                      <td class="text-start" style="width: 50%;">
                        <div class="d-flex align-items-center gap-2">
                          <span>${item.icon}</span>
                          <strong>${item.label}</strong>
                        </div>
                      </td>
                      <td class="text-end" style="width: 50%;">
                        ${item.value}
                      </td>
                    </tr>
                  `).join("")}
                </tbody>
              </table>
            </div>
          </div>
        `;

        }).join("");

        const selector = `
          <div class="d-flex justify-content-between align-items-center border-top pt-3" style="font-size: 14px;">
            <div class="d-flex align-items-center gap-2">
              <label for="itemsPerPage" class="mb-0">Mostrar:</label>
              <select id="itemsPerPage" class="form-select form-select-sm w-auto">
                <option value="9" ${itemsPerPage === 9 ? "selected" : ""}>9</option>
                <option value="25" ${itemsPerPage === 25 ? "selected" : ""}>25</option>
                <option value="50" ${itemsPerPage === 50 ? "selected" : ""}>50</option>
              </select>
            </div>
            <div class="d-flex align-items-center gap-2">
              Página ${currentPage} de ${totalPages}
              ${currentPage > 1 ? `
                <button id="prevPage" class="btn btn-sm btn-outline-secondary" title="Página anterior">
                  <i class="bi bi-arrow-left-circle"></i>
                </button>` : ""}
              ${currentPage < totalPages ? `
                <button id="nextPage" class="btn btn-sm btn-outline-secondary" title="Página siguiente">
                  <i class="bi bi-arrow-right-circle"></i>
                </button>` : ""}
            </div>
          </div>
        `;

        Swal.fire({
          title: '<span style="font-family: Segoe UI; font-size: 20px; color: #222;">📊 Sensibilidades registradas</span>',
          html: contentHtml + selector,
          width: '650px',
          showConfirmButton: false,
          showCloseButton: true,
          customClass: { popup: 'text-start' },
          didRender: () => {
            const perPageSelector = document.getElementById("itemsPerPage");
            if (perPageSelector) {
              perPageSelector.addEventListener("change", (e) => {
                itemsPerPage = parseInt(e.target.value);
                currentPage = 1;
                renderPaginatedContent();
              });
            }

            const prevBtn = document.getElementById("prevPage");
            const nextBtn = document.getElementById("nextPage");
            if (prevBtn) prevBtn.onclick = () => { currentPage--; renderPaginatedContent(); };
            if (nextBtn) nextBtn.onclick = () => { currentPage++; renderPaginatedContent(); };
          }
        });
      }

      renderPaginatedContent();
    })
    .catch(err => {
      console.error(err);
      Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error',
        title: 'No se pudo obtener la información.',
        showConfirmButton: false,
        timer: 3000
      });
    });
}



function actualizarYSalir() {
  try {
    // 1. Llamar a updateestado.php
     fetch('./bd/updateestado.php', {
      method: 'POST'
    });

    // 2. Cerrar sesión llamando a logout.php
     fetch('./logout.php', {
      method: 'POST'
    });

    // 3. Redirigir al login o a página de inicio
    window.location.href = './index.php';
  } catch (error) {
    console.error("Error al actualizar estados o cerrar sesión:", error);
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'No se pudo actualizar ni cerrar sesión correctamente.'
    });
  }
}