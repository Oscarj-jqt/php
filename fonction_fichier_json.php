<?php

function recupererTousLesUtilisateurs(string $fichier) {
    $contenu = file_get_contents($fichier);

    return json_decode($contenu, true);
}

function trouverUtilisateurGraceAIdentifiantEtMdp(string $identifiant, string $mdp) {
    $utilisateurs = recupererTousLesUtilisateurs('utilisateurs.json'); // array (= tableau d'utilisateurs)

    foreach ($utilisateurs as $u) {
        if (
            $u['identifiant'] === $identifiant
            && $u['mdp'] === $mdp
        ) {
            return $u;
        }
    }

    return false;
}

function inscrireUtilisateurDansJSON(string $identifiant, string $mdp, string $pseudo, string $avatar) {
    $utilisateur = [
        'id' => uniqid(),
        'identifiant' => $identifiant,
        'mdp' => $mdp,
        'pseudo' => $pseudo,
        'avatar' => $avatar
    ];

    $tousLesUtilisateurs = recupererTousLesUtilisateurs('utilisateurs.json');
    $tousLesUtilisateurs[] = $utilisateur; // = array_push($tousLesUtilisateurs, $utilisateur)

    $json = json_encode($tousLesUtilisateurs, JSON_PRETTY_PRINT);

    file_put_contents('utilisateurs.json', $json);
}

function trouverUtilisateurGraceAID(string $id) {
    $utilisateurs = recupererTousLesUtilisateurs('utilisateurs.json'); // array (= tableau d'utilisateurs)

    foreach ($utilisateurs as $u) {
        if ($u['id'] === $id) {
            return $u;
        }
    }

    return false;
}
