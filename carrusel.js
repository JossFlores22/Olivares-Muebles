document.addEventListener("DOMContentLoaded", function() {
    const carruselCaja = document.getElementById("carrusel-caja");
    const carruselContenido = document.getElementById("carrusel-contenido");
    const carruselElementos = carruselCaja.getElementsByClassName("carrusel-elemento");
    const botones = document.querySelectorAll("#anterior, #siguiente, #play-pause");
    let index = 0;
    let autoplayInterval;

    function mostrarElemento(i) {
        for (let j = 0; j < carruselElementos.length; j++) {
            carruselElementos[j].style.display = "none";
        }
        carruselElementos[i].style.display = "block";
    }

    function siguienteElemento() {
        index++;
        if (index >= carruselElementos.length) {
            index = 0;
        }
        mostrarElemento(index);
    }

    function anteriorElemento() {
        index--;
        if (index < 0) {
            index = carruselElementos.length - 1;
        }
        mostrarElemento(index);
    }

    function autoplay() {
        autoplayInterval = setInterval(siguienteElemento, 2000); // Cambia cada 5 segundos
    }

    function mostrarBotones() {
        botones.forEach(boton => {
            boton.style.opacity = "1";
        });
    }

    function ocultarBotones() {
        botones.forEach(boton => {
            boton.style.opacity = "0";
        });
    }

    carruselContenido.addEventListener("mouseenter", mostrarBotones);
    carruselContenido.addEventListener("mouseleave", ocultarBotones);

    document.getElementById("siguiente").addEventListener("click", function() {
        clearInterval(autoplayInterval); // Detener el autoplay al hacer clic manualmente
        siguienteElemento();
    });

    document.getElementById("anterior").addEventListener("click", function() {
        clearInterval(autoplayInterval); // Detener el autoplay al hacer clic manualmente
        anteriorElemento();
    });

    document.getElementById("play-pause").addEventListener("click", function() {
        const boton = document.getElementById("play-pause");
        if (boton.classList.contains("playing")) {
            clearInterval(autoplayInterval);
            boton.classList.remove("playing");
        } else {
            autoplay();
            boton.classList.add("playing");
        }
    });

    autoplay(); // Iniciar autoplay al cargar la página
});
