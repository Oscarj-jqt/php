<?php

include './traitement_toutes_pages.php'; 

include './fonction_fichier_json.php';

if (
    !empty($_POST['login'])
    && !empty($_POST['password'])
) {
    // foreach ($utilisateur as $u) {
    //     if (
    //         $u['identifiant'] === $_POST['login']
    //         && $u['mdp'] === $_POST['password']
    //     )
    // }
    $utilisateur = trouverUtilisateurGraceAIdentifiantEtMdp($_POST['login'], $_POST['password']);
    
    if ($utilisateur) {
        $_SESSION = $utilisateur;

        if (isset($_POST['remember'])) {
            // L'utilisateur veut qu'on se souvienne de lui
            // On crée un cookie avec une info qui permet de le reconnaître

            setcookie('remember', $utilisateur['id'], time() + 395 * 24 * 3600); // Dure 13 mois
        }

        header('location: accueil.php');
    }
}


die('Mauvais identifiant ou mot de passe.');
