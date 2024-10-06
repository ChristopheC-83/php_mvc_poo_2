<?php


require_once("./controllers/Utilities.php");
require_once("./models/CharactersModel.php");
require_once("./models/SidesModel.php");
require_once("./models/UsersModel.php");

class MainController
{
    public $charactersModel;
    public $sidesModel;
    public $usersModel;

    public function __construct()
    {
        $this->charactersModel = new CharactersModel();
        $this->sidesModel = new SidesModel();
        $this->usersModel = new UsersModel();
    }
    
    public function homePage() {

        $character =  $this->charactersModel->getLastCharacter();

        $datas_page=[
            "description" => "Bienvenue sur la page d'accueil",
            "title" => "Accueil",
            "view" => "views/pages/homePage.php",
            "layout" => "views/commons/layout.php",
            "character"=> $character
        ];

        Utilities::renderPage($datas_page);

    }


    public function errorPage($msg)
    {
        
        $message = $msg;

        $datas_page=[
            "description" => "On est perdu ?",
            "title" => "Erreur",
            "view" => "views/pages/errorPage.php",
            "layout" => "views/commons/layout.php",
            "message"=> $message
        ];

        Utilities::renderPage($datas_page);
    }
}
