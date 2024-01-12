function contacto() {
    var formData = {
        'nombre': document.getElementById('nombre').value,
        'email': document.getElementById('email').value,
        'acerca': document.getElementById('acerca').value,
        'comentario': document.getElementById('comentario').value
    };

    // Convierte el objeto en una cadena JSON
    var jsonData = JSON.stringify(formData);

    // Crea un objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configura la solicitud AJAX
    xhr.open('POST', '../php/contacto.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    // Maneja el evento de carga
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Éxito en la solicitud
            console.log(xhr.responseText);
        } else {
            // Error en la solicitud
            console.error('Error en la solicitud: ' + xhr.status);
        }
    };

    // Envía la solicitud con los datos JSON
    xhr.send(jsonData);
}