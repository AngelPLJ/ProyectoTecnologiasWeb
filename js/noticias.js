var miDivs = document.querySelectorAll('.noticia');

miDivs.forEach(function(div){
    div.addEventListener('click', function(){
        var urla = this.getAttribute('data-redirect');
        console.log(urla);
        window.location.href = urla; 
    })
})