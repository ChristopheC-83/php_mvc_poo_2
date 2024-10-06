<?php
session_start();

// pour plus tard
define("ROOT", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https"  : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));

require_once("./controllers/Utilities.php");
require_once("./controllers/MainController.php");
$mainController = new MainController();
require_once("./controllers/CharactersController.php");
$charactersController = new CharactersController();
require_once("./controllers/user/SidesController.php");
$sidesController = new SidesController();
require_once("./controllers/user/UsersController.php");
$usersController = new UsersController();

// Utilities::showArray($_SESSION);

try {
    if (empty($_GET['page'])) {
        $url[0] = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    }
    switch ($url[0]) {
        case "accueil":
            $mainController->homePage();
            break;


        case 'connexion':
            // echo "connexion";
            if (Utilities::isConnected()) {
                header("location: " . ROOT );
            } else {
                $usersController->loginPage();
            }
            break;

        case "login":
            $name = htmlentities($_POST['name']);
            $password = htmlentities($_POST['password']);
            if (empty($name) || empty($password)) {
                throw new Exception("Veuillez remplir tous les champs.");
            }
            $usersController->login($name, $password);

        case 'enregistrement':
            // echo "enregistrement";
            if (Utilities::isConnected()) {
                header("location: " . ROOT );
            } else {
                $usersController->registerPage();
            }
            break;

        case "register":
            $name = htmlentities($_POST['name']);
            $role = htmlentities($_POST['role']);
            $password = htmlentities($_POST['password']);
            if (empty($name) || empty($password)) {
                throw new Exception("Veuillez remplir tous les champs.");
            }
            $usersController->register($name,$role, $password);
        case "compte":
            require_once("./indexComponents/userIndex.php");
            break;
        case "personnages":
            require_once('./indexComponents/charactersIndex.php');
            break;
        
        case "classes":
            if(Utilities::isConnected()) {
                require_once('./indexComponents/sidesIndex.php');
            } else {
                header("location: " . ROOT . "connexion");
            }
            break;
        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    $mainController->errorPage($e->getMessage());
}
