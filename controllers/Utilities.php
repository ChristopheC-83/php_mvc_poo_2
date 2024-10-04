<?php 


class Utilities {

    public static function renderPage($datas_page){

    extract($datas_page);
    ob_start();
    require_once ($view);
    $content = ob_get_clean();
    require_once ($layout);

    }

    public static function showArray($datas_array){
        echo "<pre>";
        print_r($datas_array);
        echo "</pre>";
    }

}