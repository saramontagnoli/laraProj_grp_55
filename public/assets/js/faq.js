/*
    Codice JavaScript associato alla pagina delle F.A.Q.
    Permette di cliccare sulla domanda di interesse e di far apparire o sparire la rispettiva risposta
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
        //viene aggiunta o tolta la classe active all'elemento che viene cliccato
        this.classList.toggle("active");7

        //viene assegnato a risposta l'elemento HTML subito successivo (ovvero la risposta alla domande che si sta analizzando)
        var risposta = this.nextElementSibling;

        //viene verificato se è già definita un'altezza massima inline, se sì viene impostata a null rimuovendola
        if (risposta.style.maxHeight) {
            risposta.style.maxHeight = null;
        } else {
            //in caso contrario, se l'altezza massima non è definita inline allora viene impostata secondo lo scrollHeight
            risposta.style.maxHeight = risposta.scrollHeight + "px";
        }
    });
}
