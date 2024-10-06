<?php


//   pour un $url[0] = compte

switch ($url[1]) {
    case "logout":
        $usersController->logout();
        break;

    case "profil":
        if (Utilities::isConnected()) {
            $usersController->profilePage();
        } else {
            header("location: " . ROOT . "connexion");
        }
        break;

    default:
        throw new Exception("La page de Compte demandée n'existe pas.");
}
