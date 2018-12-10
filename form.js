
var nom = document.getElementById("nom");
nom.value = "votre nom";

// Affichage d'un message contextuel pour la saisie du pseudo
nom.addEventListener("focus", function () {
    document.getElementById("aidePseudo").textContent = "Entrez votre nom";
});
// Suppression du message contextuel pour la saisie du pseudo
nom.addEventListener("blur", function (e) {
    document.getElementById("aidePseudo").textContent = "";
});
// Focus sur la zone de saisie du pseudo
pseudoElt.focus();
