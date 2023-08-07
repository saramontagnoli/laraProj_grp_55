var domande = document.getElementsByClassName("domanda");
var i;

for (i = 0; i < domande.length; i++) {
    domande[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var risposta = this.nextElementSibling;
        if (risposta.style.maxHeight) {
            risposta.style.maxHeight = null;
        } else {
            risposta.style.maxHeight = risposta.scrollHeight + "px";
        }
    });
}
