//funzione utilizzata per confermare la cancellazione di un auto da parte dello staff
function confirmDelete() {
    return confirm("Sei sicuro di voler eliminare questa auto?");
}

/* Classe per la modifica dei dati di un utente */
function myFunction() {
    let text;
    if (confirm("sei sicuro di modificare i tuoi dati?") == true) {
        text = "You pressed OK!";
    } else {
        text = "You canceled!";
    }
    document.getElementById("demo").innerHTML = text;
}
