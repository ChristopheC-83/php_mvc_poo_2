<?php 

require_once("./controllers/MainController.php");

class SidesController extends MainController{

    public function sidesListPage() {

        $sides =  $this->sidesModel->getAllSides();

        $datas_page=[
            "description" => "Bienvenue sur la page des classes de personnages",
            "title" => "Les Classes",
            "view" => "views/pages/sides/sidesListPage.php",
            "layout" => "views/commons/layout.php",
            "sides"=> $sides
        ];

        Utilities::renderPage($datas_page);

    }


}