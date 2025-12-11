import './bootstrap';

// --- LÒGICA DE LES PREGUNTES ---
let vides = 3; 
let contestat = false;

function verificar(element, esCorrecte) {
    if (contestat) return; // Si ja ha contestat, no fem res

    if (esCorrecte) {
        // CORRECTE (Verd)
        element.style.backgroundColor = "#4ade80"; 
        element.style.borderColor = "#22c55e";
        element.style.color = "#000";
        // Mostrem botó següent
        var btn = document.getElementById("btnNext");
        if(btn) btn.style.display = "block";
        contestat = true; 
    } else {
        // INCORRECTE (Vermell)
        element.style.backgroundColor = "#f87171"; 
        element.style.borderColor = "#ef4444";
        vides--;
        actualitzarCors();
        if (vides <= 0) {
            alert("Has perdut totes les vides!");
            // Ajusta aquesta ruta si cal segons on tinguis el mapa
            window.location.href = "../../../pages/mapa_niveles.html"; 
        }
    }
}

function actualitzarCors() {
    const divVides = document.getElementById("contenidorVides");
    if (divVides) {
        divVides.innerHTML = ""; 
        for (let i = 0; i < vides; i++) {
            divVides.innerHTML += '<span class="corazon">❤️</span> ';
        }
    }
}