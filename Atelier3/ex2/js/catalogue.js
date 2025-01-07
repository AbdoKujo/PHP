$(document).ready(function() {
    chargerCategories();
});

function chargerCategories() {
    $.get("categories.php", function(rep) {
        $("#divCat").html(rep);
        $('#cat').change(function() {
            chargerProduits($(this).val());
        });
    });
}

function chargerProduits(idC) {
    $.get("produits.php", {
        idCat: idC
    }, function(rep) {
        $("#divProduit").html(rep);
    });
}