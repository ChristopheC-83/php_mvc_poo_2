<?php

require_once("./controllers/MainController.php");

class SidesController extends MainController
{

    public function sidesListPage()
    {

        $sides =  $this->sidesModel->getAllSides();

        $datas_page = [
            "description" => "Bienvenue sur la page des classes de personnages",
            "title" => "Les Classes",
            "view" => "views/pages/sides/sidesListPage.php",
            "layout" => "views/commons/layout.php",
            "sides" => $sides
        ];

        Utilities::renderPage($datas_page);
    }

    public function modifySide($id, $oldName, $side, $color)
    {
        $sideNameExists = $this->sidesModel->getSideByName($side);
        // Utilities::showArray($sideNameExists);
        if (!$sideNameExists ||  $oldName === $side) {
            // echo "nom dispo";
            if ($this->sidesModel->updateSideDB($id, $side, $color)) {
                header("Location: " . ROOT . "classes/liste");
            } else {
                throw new Exception("Erreur lors de la modification de la classe");
            }
        } else {
            // echo "nom pas dispo";
            throw new Exception("Le nom de la classe existe déjà <br><br>
            <a href='./liste'>Retour au formulaire</a>
            <br><br>
            OU");
        }
    }

    public function deleteSide($id)
    {
        if ($this->sidesModel->deleteSideDB($id)) {
            header("Location: " . ROOT . "classes/liste");
        } else {
            throw new Exception("Erreur lors de la suppression de la classe. <br> N'y aurait il pas un personnage associé à cette classe ? <br><br> 
            <a href='./liste'>Retour aux classes</a>
            <br><br>OU <br>
            ");
        }
    }

    public function createSide($side, $color, $author)
    {
        $sideNameExists = $this->sidesModel->getSideByName($side);
        if (!$sideNameExists) {
            if ($this->sidesModel->createSideDB($side, $color, $author)) {
                header("Location: " . ROOT . "classes/liste");
            } else {
                throw new Exception("Erreur lors de la création de la classe");
            }
        } else {
            throw new Exception("Le nom de la classe existe déjà <br><br>
            <a href='./liste'>Retour au formulaire</a>
            <br><br>
            OU");
        }
    }
}
