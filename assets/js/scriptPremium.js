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
    const deviceType = deviceTypeSelect.options[deviceTypeSelect.selectedIndex].text;
    const screenSize = screenSizeSelect.options[screenSizeSelect.selectedIndex].text;

    if (!deviceType || !screenSize) {
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
    if (deviceType === "APPLE") {
      const options = ['Sencillo', 'Preciso', 'Refinado', 'Sin DPI'];
      const chosenOption = options[Math.floor(getRandomNumber(0, options.length))];
      dpiLabel = `<b>${chosenOption}:</b> ${chosenOption === 'Sin DPI' ? '' : Math.floor(getRandomNumber(31, 120))}`;
    } else {
      const dpiOptions = ['400', '450', '500', '550', 'Sin DPI', '600', '650'];
      const chosenDPIOption = dpiOptions[Math.floor(getRandomNumber(0, dpiOptions.length))];
      dpiLabel = `<b>DPI:</b> ${chosenDPIOption}`;
    }

    const resultHTML = `
      <h4><span>${screenSize}</span></h4>
      <b>General:</b> ${generalSensitivity}<br>
      <b>Mira de Punto Rojo:</b> ${redDotSensitivity}<br>
      <b>Mira X2:</b> ${x2ScopeSensitivity}<br>
      <b>Mira X4:</b> ${x4ScopeSensitivity}<br>
      <b>Tamaño del Botón:</b> ${buttonSize}<br>
      ${dpiLabel}
    `;

    resultDiv.innerHTML = resultHTML;
    resultDiv.style.display = 'block';

    // Guardar en la BD
    const modeloId = screenSizeSelect.value;
    const fechaActual = new Date().toISOString().split('T')[0];

    const sensibilidadJSON = JSON.stringify({
      general: generalSensitivity,
      punto_rojo: redDotSensitivity,
      mira_x2: x2ScopeSensitivity,
      mira_x4: x4ScopeSensitivity,
      boton: buttonSize,
      dpi: dpiLabel.replace(/<\/?[^>]+(>|$)/g, "")
    });

    fetch('./bd/insertar_sensibilidades.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: new URLSearchParams({
        _modelo: modeloId,
        fecha: fechaActual,
        sensibilidad: sensibilidadJSON
      })
    })
      .then(response => response.json())
      .then(data => {
        console.log("Respuesta del servidor:", data);
        if (data.success) {
          Swal.fire({
            icon: 'success',
            title: 'Sensibilidad guardada correctamente'
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error al guardar',
            text: data.message || 'Inténtalo de nuevo'
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
