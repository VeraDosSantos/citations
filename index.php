<?php
//Exercice 1 : Créer un tableau associatif d'auteurs avec un index pour chaque auteur
$auteurs = [
    1 => "Coluche",
    2 => "Film Juno",
    3 => "Le Corbusier",
    4 => "Proverbe chinois",
    5 => "Pearl Buck",

];

//Exercice 2 : Créer un tableau associatif contenant les détails suivants : la citation et l'id de l'auteur
$citations = [
    [
        "citation" => "Quand j'étais petit à la maison, le plus dur c'était la fin du mois... Surtout les trente derniers jours !",
        "idAuteur" => 1,
        //Exercice 7 : Ajouter une image libre de droit pour chaque citation
        "image" => "https://cdn.shopify.com/s/files/1/0094/3551/2928/files/fond_ecran_licorne_bleu.jpg?v=1588769158"
    ],
    [
        "citation" => "Je réalise que j'aime ma maison quand je reviens d'ailleurs.",
        "idAuteur" => 2,
        //Exercice 7 : Ajouter une image libre de droit pour chaque citation
        "image" => "https://cdn.shopify.com/s/files/1/0094/3551/2928/files/fond_d_ecran_licorne_deadpool.jpg?v=1588769269"
    ],
    [
        "citation" => "L'architecture actuelle s'occupe de la maison, de la maison ordinaire et courante pour hommes normaux et courants. Elle laisse tomber les palais. Voilà un signe des temps.",
        "idAuteur" => 3,
        //Exercice 7 : Ajouter une image libre de droit pour chaque citation
        "image" => "https://cdn.shopify.com/s/files/1/0094/3551/2928/files/fond_d_ecran_femme_licorne.jpg?v=1588769500"
    ],
    [
        "citation" => "Quand l'enfant quitte la maison, il emporte la main de sa mère.",
        "idAuteur" => 4,
        //Exercice 7 : Ajouter une image libre de droit pour chaque citation
        "image" => "https://cdn.shopify.com/s/files/1/0094/3551/2928/files/fond_ecran_pipi_licorne_arc_en_ciel.jpg?v=1588769914"
    ],
    [
        "citation" => "Quand la maison d'un homme est pleine de chiens sauvages il lui faut chercher la paix ailleurs.",
        "idAuteur" => 5,
        //Exercice 7 : Ajouter une image libre de droit pour chaque citation
        "image" => "https://cdn.shopify.com/s/files/1/0094/3551/2928/files/fond_ecran_robot_licorne_arc_en_ciel.jpg?v=1588770275"
    ],

];

//Exercice 3 : Créer une fonction pour aller chercher une citation au "hasard" qui change à chaque rechargement de page
function citationAleatoire($monTableauDeCitations)
{
    $indexAleatoire = array_rand($monTableauDeCitations);
    return $monTableauDeCitations[$indexAleatoire];
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
    <link rel="stylesheet" href="css/style.css">
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
    <div class="container mt-5 myContainer">
        <h1 class="mb-4">Citation du Jour</h1>

        <!-- Exercice 8 : Afficher l'image dans le HTML avec du style -->
        <img src="<?php echo $citation["image"]; ?>" alt="<?php echo $auteurs[$citation["idAuteur"]]; ?>" class="rounded text-center" style="width: 40rem;">
        <!-- Fin Exercice 8 : Afficher l'image dans le HTML avec du style -->

        <blockquote class="blockquote">
            <p class="m-4"><?php echo $citation["citation"]; ?></p>
        </blockquote>

        <!-- Exercice 10 : Afficher l'auteur avec du style sur ta page -->
        <footer class="blockquote-footer"><?php echo $auteurCitation; ?></footer>

        <a href="/citations/"><button type="button" class="btn btn-outline-warning">La prochaine</button></a>
    </div>
    <!-- Fin Exercice 4 : Afficher en HTML la citation ET Exercice 5 : Ajouter du style avec Bootstrap-->



    <!-- autre façon: Afficher l'auteur avec du style sur ta page -->
    <!--<footer class="blockquote-footer"><?php echo $auteurs[$citation["idAuteur"]]; ?></footer>-->
    <!-- Fin Exercice 10 : Afficher l'auteur avec du style sur ta page -->
</body>

</html>