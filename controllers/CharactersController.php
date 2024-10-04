<?php 

require_once('./controllers/MainController.php');
class Characterscontroller extends MainController{

    public function charactersList(){

        $characters = $this->charactersModel->getAllCharacters();
        $datas_page=[
            "description" => "Bienvenue sur la page des personnages",
            "title" => "Tous les Personnages",
            "view" => "views/pages/characters/allCharactersPage.php",
            "layout" => "views/commons/layout.php",
            "characters"=> $characters
        ];
        Utilities::renderPage($datas_page);
    }    
    public function createCharacter(){

        $characters = $this->charactersModel->getAllCharacters();
        $sides = $this->sidesModel->getAllSides();
        $datas_page=[
            "description" => "Bienvenue sur la page de création des personnages",
            "title" => "Créons un Personnage",
            "view" => "views/pages/characters/createCharacterPage.php",
            "layout" => "views/commons/layout.php",
            "characters"=> $characters,
            "sides"=> $sides,
        ];
        Utilities::renderPage($datas_page);
    }    

    public function createNewCharacter($name, $image, $health, $magic, $power, $side){

        if ($this->charactersModel->createNewCharacterDB($name, $image, $health, $magic, $power, $side)) {
            header("Location: ".ROOT);
        } else {
            throw new Exception("Erreur lors de la création du personnage");
        }
    }

    public function deleteCharacter($id){
        if ($this->charactersModel->deleteCharacterDB($id)) {
            header("Location: ".ROOT."personnages/liste");
        } else {
            throw new Exception("Erreur lors de la suppression du personnage");
        }
    }

    public function modifyCharacter($id){

        $character = $this->charactersModel->getOneCharacter($id);
        $sides = $this->sidesModel->getAllSides();
        $datas_page=[
            "description" => "Bienvenue sur la page de modification des personnages",
            "title" => "Modifions : ".$character['name'],
            "view" => "views/pages/characters/modifyCharacterPage.php",
            "layout" => "views/commons/layout.php",
            "character"=> $character,
            "sides"=> $sides,
        ];
        Utilities::renderPage($datas_page);
    }   

    public function updateCharacter($id,$name, $image, $health, $magic, $power, $side){
           
            if ($this->charactersModel->updateCharacterDB($id,$name, $image, $health, $magic, $power, $side)) {
                header("Location: ".ROOT."personnages/liste");
            } else {
                throw new Exception("Erreur lors de la modification du personnage");
            }

    }

}