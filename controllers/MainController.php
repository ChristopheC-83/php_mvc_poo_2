<?php 



class MainController
{
    // temps 1 : on teste la fonction homePage  
    // public function homePage(){
    //     echo "coucou l'accueil";
    // }
    public function page1Page(){
        echo "coucou la page 1";

    }

    // temps2 : appel de la homePage
    public function homePage(){
        require_once("./views/pages/homePage.php");

    }

    public function errorPage($msg){
        echo ("coucou l'erreur <br>".$msg);
    }


}