<?php
//Exercice 1 : Créer un tableau associatif d'auteurs avec un index pour chaque auteur
$auteurs = [
    1 => "Albert Einstein",
    2 => "Steve Jobs",
    // Ajoutez d'autres auteurs...
];

//Exercice 2 : Créer un tableau associatif contenant les détails suivants : la citation et l'id de l'auteur
$citations = [
    [
        "citation" => "La vie est un mystère qu'il faut vivre, et non un problème à résoudre.",
        "idAuteur" => 1,
        //Exercice 7 : Ajouter une image libre de droit pour chaque citation
        "image" => "https://media.sudouest.fr/13298067/1200x-1/einstein-langue-1600-1600.jpg?v=1670579321"
    ],
    [
        "citation" => "La seule façon de faire du bon travail est d'aimer ce que vous faites.",
        "idAuteur" => 2,
        //Exercice 7 : Ajouter une image libre de droit pour chaque citation
        "image" => "https://cdn.profoto.com/cdn/0532192/contentassets/d39349344d004f9b8963df1551f24bf4/profoto-albert-watson-steve-jobs-pinned-image-3840x2160px-2.jpg?width=1200&quality=75&format=jpg"
    ],
    // Ajoutez d'autres citations...
];

//Exercice 3 : Créer une fonction pour aller chercher une citation au "hasard" qui change à chaque rechargement de page
function citationAleatoire($mesCitations)
{
    $indexAleatoire = array_rand($mesCitations);
    return $mesCitations[$indexAleatoire];
}

// Exemple d'utilisation :
$citation = citationAleatoire($citations);
//echo $citation["citation"];


// Exercice 9 : Créer une fonction qui va chercher l'auteur de la citation
function chercherAuteur($idAuteur, $auteurs)
{
    return $auteurs[$idAuteur] ?? "Auteur Inconnu";
}


$auteurCitation = chercherAuteur($citation["idAuteur"], $auteurs);
//echo $auteurCitation;


// Bonus les jours et mois en Français :
// Définir la locale française
setlocale(LC_TIME, 'fr_FR');

// Créer un objet DateTime pour la date actuelle
$date = new DateTime();

// Créer un formateur de date avec la locale française
$formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);

// Afficher le nom du jour en français
$nomJour = $formatter->format($date);
//echo $nomJour;

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Citations</title>
</head>

<body>
    <!-- Exercice 6 : Ajouter la date du jour sous la forme de : "Bonjour, nous sommes le mardi 3 mars 2024 et il est 12h45"-->
    <!-- <p class="mb-0"><?php echo "Bonjour, nous sommes le " . date("l j F Y") . " et il est " . date("H\hi"); ?></p> -->
    <!-- Fin Exercice 6 : Ajouter la date du jour sous la forme de : "Bonjour, nous sommes le mardi 3 mars 2024 et il est 12h45"-->

    <!-- Exercice Bonus : Ajouter la date du jour en Français-->
    <p class="mb-0"><?php echo "Bonjour, nous sommes le " . $formatter->format($date) . " et il est " . date("H\hi"); ?></p>
    <!-- Fin Exercice Bonus : Ajouter la date du jour en Français-->

    <!--Exercice 4 : Afficher en HTML la citation ET Exercice 5 : Ajouter du style avec Bootstrap -->
    <div class="container mt-5">
        <h1 class="mb-4">Citation du Jour</h1>

        <!-- Exercice 8 : Afficher l'image dans le HTML avec du style -->
        <img src="<?php echo $citation["image"]; ?>" alt="Image Citation" class="rounded float-start">
        <!-- Fin Exercice 8 : Afficher l'image dans le HTML avec du style -->

        <blockquote class="blockquote">
            <p class="mb-0"><?php echo $citation["citation"]; ?></p>
        </blockquote>
    </div>
    <!-- Fin Exercice 4 : Afficher en HTML la citation ET Exercice 5 : Ajouter du style avec Bootstrap-->


    <!-- Exercice 10 : Afficher l'auteur avec du style sur ta page -->
    <footer class="blockquote-footer"><?php echo $auteurCitation; ?></footer>
    <!-- autre façon: Afficher l'auteur avec du style sur ta page -->
    <!--<footer class="blockquote-footer"><?php echo $auteurs[$citation["idAuteur"]]; ?></footer>-->
    <!-- Fin Exercice 10 : Afficher l'auteur avec du style sur ta page -->
</body>

</html>