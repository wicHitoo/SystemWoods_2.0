function generateSensitivities() {
    const deviceType = document.getElementById('deviceType').value;
    const screenSizeSelect  = document.getElementById('screenSize');
    const screenSize = screenSizeSelect.options[screenSizeSelect.selectedIndex].text;
    const resultDiv = document.getElementById('result');

    if (!deviceType || !screenSize) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Por favor, selecciona un tipo de dispositivo y un modelo válido.'
        });
        return;
    }

    if (!isValidScreenSize(screenSize)) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Escribe un modelo correcto, evitando caracteres especiales.'
        });
        return;
    }

    const generalSensitivity = getRandomNumber(100, 190);
    const redDotSensitivity = getRandomNumber(120, 150);
    const x2ScopeSensitivity = getRandomNumber(55, 150);
    const x4ScopeSensitivity = getRandomNumber(55, 150);
    const buttonSize = getRandomNumber(40, 55);
    
    
    //CONTENEDOR 
    const resultHTML = `
        <h4><span> ${screenSize}</span></h4>
        <b>General:</b> ${Math.floor(generalSensitivity)}<br>
        <b>Mira de Punto Rojo:</b> ${Math.floor(redDotSensitivity)}<br>
        <b>Mira X2:</b> ${Math.floor(x2ScopeSensitivity)}<br>
        <b>Mira X4:</b> ${Math.floor(x4ScopeSensitivity)}<br>
        <b>Tamaño del Botón:</b> ${Math.floor(buttonSize)}
    `;

    // Mostrar el resultado y hacer visible el div
    resultDiv.innerHTML = resultHTML;
    resultDiv.style.display = 'block';
}

function isValidScreenSize(text) {
    const regex = /^[a-zA-Z0-9]+([.\-]?[a-zA-Z0-9\s])*[.\-]?$/;
    return regex.test(text);
}

function getRandomNumber(min, max) {
    return Math.random() * (max - min + 1) + min;
}
function redirectToPremium() {
    window.location.href = 'inicio.php';    
}

document.getElementById('generateBtn').addEventListener('click', generateSensitivities);
        document.getElementById('deviceType').addEventListener('change', function() {
        var marcaId = this.value;
    
        if (marcaId) {
          fetch('././bd/get_models.php?marca=' + marcaId)
            .then(response => response.json())
            .then(data => {
                var modelSelect = document.getElementById('screenSize');
                modelSelect.innerHTML = ''; // Clear previous options

                data.forEach(function(model) {
                    var option = document.createElement('option');
                    option.value = model.idmodelocelular;
                    option.text = model.Nombre;
                    modelSelect.add(option);
                });
            })
            .catch(error => console.error('Error:', error));
        } else {
          document.getElementById('screenSize').innerHTML = '<option value=""></option>';
    }
});