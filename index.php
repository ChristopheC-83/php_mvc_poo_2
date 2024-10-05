<?php

// pour plus tard
define("ROOT", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https"  : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));

require_once("./controllers/Utilities.php");
require_once("./controllers/MainController.php");
$mainController = new MainController();
require_once("./controllers/CharactersController.php");
$charactersController = new CharactersController();
require_once("./controllers/user/SidesController.php");
$sidesController = new SidesController();

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



        case "personnages":
            require_once('./indexComponents/charactersIndex.php');
            break;
        case "classes":
            require_once('./indexComponents/sidesIndex.php');
            break;
        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    $mainController->errorPage($e->getMessage());
}
