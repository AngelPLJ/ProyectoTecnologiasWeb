document.addEventListener("DOMContentLoaded", function() {
  // Realiza una solicitud AJAX para obtener el archivo JSON
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
          // Maneja la respuesta JSON
          var jsonResponse = JSON.parse(xhr.responseText);
          llenarImagenes(jsonResponse);
      }
  };

  xhr.open("GET", "../php/ObtenerDatos.php", true);
  xhr.send();
});

function llenarImagenes(data) {
  // ObtÃ©n el contenedor donde se mostrarÃ¡n los datos
  var imagen1 = document.getElementById("imagen1");
  var imagen2 = document.getElementById("imagen2");
  var imagen3 = document.getElementById("imagen3");
  var cont = 1;

  // Cambia las imagenes y e texto
  for (var key in data) {
    if (data.hasOwnProperty(key)) {
          switch(cont) {
            case 1: {
              imagen1.innerHTML = "<a href='../php/noticia.php?id=" + data[key]['id'] + "'><img src='" + data[key]['imagen'] + "' style='width: 100%;'></a><div class='text'>" + data[key]['tituloNot'] + "</div>";
            } 
            case 2: {
              imagen2.innerHTML = "<a href='../php/noticia.php?id=" + data[key]['id'] + "'><img src='" + data[key]['imagen'] + "' style='width: 100%;'></a><div class='text'>" + data[key]['tituloNot'] + "</div>";
            } 
            case 3: {
              imagen3.innerHTML = "<a href='../php/noticia.php?id=" + data[key]['id'] + "'><img src='" + data[key]['imagen'] + "' style='width: 100%;'></a><div class='text'>" + data[key]['tituloNot'] + "</div>";
            } 
          }
          cont = cont + 1;
      }
  }
}


let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("fade");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}