document.addEventListener("DOMContentLoaded", function() {
    // Realiza una solicitud AJAX para obtener el archivo JSON
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Maneja la respuesta JSON
            var jsonResponse = JSON.parse(xhr.responseText);
            llenarParrafos(jsonResponse);
        }
    };

    xhr.open("GET", "../php/ObtenerDatos.php", true);
    xhr.send();
});

function llenarParrafos(data) {
    // ObtÃ©n el contenedor donde se mostrarÃ¡n los datos
    var contentContainer = document.getElementById("content");

    // Crea pÃ¡rrafos y llÃ©nalos con los datos del JSON
    for (var key in data) {
        if (data.hasOwnProperty(key)) {
            var paragraph = document.createElement("p");
            paragraph.textContent = key + ': ' + data[key]['autor'];
            contentContainer.appendChild(paragraph);
        }
    }
}
