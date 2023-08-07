/*
    Codice JavaScript associato alla pagina delle F.A.Q.
    Permette di cliccare sulla domanda di interesse e di far apparire la rispettiva risposta
*/

//dichiarazione variabile domande, vengono presi tutti gli elementi definiti con la classe "domande" che identifica una singola F.A.Q.
var domande = document.getElementsByClassName("domanda");

//dichiarazione variabile contatore
var i;

//scorrimento di tutti gli elementi da 0 fino al numero di domande-1
for (i = 0; i < domande.length; i++) {

    //ad ogni elemento estratto dalla collezione "domande" si associa un gestore di eventi CLICK
    //quando si fa click sopra quell'oggetto allora viene eseguita la funzione definita in seguito
    domande[i].addEventListener("click", function() {
        //
        this.classList.toggle("active");
        var risposta = this.nextElementSibling;
        if (risposta.style.maxHeight) {
            risposta.style.maxHeight = null;
        } else {
            risposta.style.maxHeight = risposta.scrollHeight + "px";
        }
    });
}
