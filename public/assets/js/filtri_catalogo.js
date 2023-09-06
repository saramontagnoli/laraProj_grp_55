$(document).ready(function () {
    var filtriVisibili = false;

    $("#mostra_filtri").click(function () {
        if (filtriVisibili) {
            // Se i filtri sono visibili, li nascondiamo
            $("#filtri").slideUp();
            filtriVisibili = false;
            $(this).text("Mostra Filtri");
        } else {
            // Se i filtri sono nascosti, li mostriamo
            $("#filtri").slideDown();
            filtriVisibili = true;
            $(this).text("Nascondi Filtri");
        }
    });
});
