<?php

require_once("./controllers/MainController.php");
class UsersController extends MainController
{

    public function loginPage()
    {

        $datas_page = [
            "description" => "Bienvenue sur la page de connexion",
            "title" => "Connexion",
            "view" => "views/pages/users/connexionPage.php",
            "layout" => "views/commons/layout.php",
        ];
        Utilities::renderPage($datas_page);
    }
    public function registerPage()
    {

        $datas_page = [
            "description" => "Bienvenue sur la page d'inscription",
            "title" => "Inscription",
            "view" => "views/pages/users/registerPage.php",
            "layout" => "views/commons/layout.php",
        ];
        Utilities::renderPage($datas_page);
    }


    public function register($name,$role, $password) {
        $userNameExists = $this->usersModel->getUserByName($name);
        if (!$userNameExists) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            if ($this->usersModel->registerDB($name,$role, $hashedPassword)) {
                header("Location: " . ROOT . "connexion");
            } else {
                throw new Exception("Connexion impossible");
            }
        } else {
            throw new Exception("Le nom d'utilisateur existe déjà <br><br>
            <a href='./enregistrement'>Retour au formulaire</a>
            <br><br>
            OU");
        }
    }
    public function login($name, $password)
    {
        $datasUser = $this->usersModel->getUserInfo($name);


        if ($this->usersModel->isAccountValid($name, $password)) {
            $_SESSION['profile']['name'] = $datasUser['name'];
            $_SESSION['profile']['role'] = $datasUser['role'];
            header("Location: " . ROOT );
        } else {
            throw new Exception("Connexion impossible");
        }
    }


    public function logout() {

        session_destroy();
        header("Location: " . ROOT );


    }

    public function profilePage(){
        {

            $datas_page = [
                "description" => "Bienvenue sur la page de profil de ". $_SESSION['profile']['name'],
                "title" => "Profil",
                "view" => "views/pages/users/profilePage.php",
                "layout" => "views/commons/layout.php",
            ];
            Utilities::renderPage($datas_page);
        }

    }
}
