/*
Codice JavaScript per la gestione dello slideshow automatico
Lo slideshow è a scorrimento automatico ogni 4 secondi
 */
let slideIndex = 0; //inizializzazione della variabile per indicare l'indice della slide
showSlides(); //richiamo della funzione per mostrare le slide dello slideshow

/*
Funzione per la gestione delle immagini dello slideshow
 */
function showSlides() {
    let i; //dichiarazione della variabile indice i
    let slides = document.getElementsByClassName("mySlides");  //estrazione di tutti gli elementi aventi classe "mySlides"
    let dots = document.getElementsByClassName("dot"); //estrazione di tutti gli elementi aventi classe "dot"

    //ciclo che scorre tutte le slide estratte nella variabile slides
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; //si imposta la visualizzazione a none (quindi vengono nascoste)
    }

    //si incremente lo slide index di 1
    slideIndex++;

    //se lo slide index è maggiore del numero totale delle slide allora assegno come indice 1, serve per creare un loop nelle slide
    if (slideIndex > slides.length) {slideIndex = 1}

    //alla slide di indice slideIndex-1 di assegna come caratteristica il display = block
    slides[slideIndex-1].style.display = "block";

    //ogni slide viene visualizzata solo per 4 secondi, poi si passa alla successiva
    setTimeout(showSlides, 4000);
}
