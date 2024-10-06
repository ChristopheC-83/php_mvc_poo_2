<?php


class Utilities
{

    public static function renderPage($datas_page)
    {

        extract($datas_page);
        ob_start();
        require_once($view);
        $content = ob_get_clean();
        require_once($layout);
    }

    public static function showArray($datas_array)
    {
        echo "<pre>";
        print_r($datas_array);
        echo "</pre>";
    }

    public static function isConnected()
    {
        return (!empty($_SESSION['profile']['name']));
    }

    public static function isCreator(){
        return (!empty($_SESSION['profile']['name']) && 
        ($_SESSION['profile']['role']  == "creator" || $_SESSION['profile']['role']  == "admin"));
    }

    public static function isAdmin(){
        return (!empty($_SESSION["profile"]["name"]) && $_SESSION['profile']['role']  == "admin");
    }
   
}