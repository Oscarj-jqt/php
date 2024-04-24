<?php
include './traitement_toutes_pages.php';
// Fichier de traitement de la demande d'inscription de l'utilisateur

var_dump($_FILES);
die;



if (
    !empty($_POST['login'])
    && !empty($_POST['password'])
    && !empty($_POST['password_conf'])
    && $_POST['password'] === $_POST['password_conf']
    && !empty($_POST['pseudo'])

    // On vérifie d'abord que l'imge est non vide 
    && !empty($_FILES['avatar'])
    // On vérifie la taille
    && $_FILES['avatar']['size'] <= 1_000_000
    && $_FILES['avatar']['error'] === 0
    // On vérifie que c'est bien une image 
    && str_starts_with($_FILES['avatar']['type'], 'image/')
) {

    // $fichier = file_get_contents('utilisateurs.json');
    // $utilisateurs = json_decode($fichier, true);

    //array.push();


    $dossier = __DIR__ . '/avatars/';
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $nom = uniqid() . '.' . $extension;

    $succes = move_uploaded_file(
        $_FILES['avatar']['tmp_name'], // Point de départ
        $dossier . $nom // Point d'arrivée
    );

    if ($succes) {
        include './fonction_fichier_json.php';
        inscrireUtilisateurDansJSON($_POST['login'], $_POST['password'], $_POST['pseudo'], $nom);
        
    }

    header('location: connexion.php');
} else {
    die('Nope');
}
