<?php

// accssible si $url[0] = classes

switch ($url[1]) {
    case "liste":
        $sidesController->sidesListPage();
        break;


    case "modifySide":
        // Utilities::showArray($_POST);
        $id = htmlentities($_POST['id']);
        $oldName = htmlentities($_POST['oldName']);
        $side = htmlentities(trim($_POST['side']));  //pb avec des espaces lors de mes tests
        $color = htmlentities($_POST['color']);
        if (empty($id) || empty($side) || empty($color)) {
            $mainController->errorPage("Tous les champs sont obligatoires !!!
            <br><br>
            <a href='./liste'>Retour à la liste des classes</a>
            <br><br>
            OU
            ");
            return;
        }
        $sidesController->modifySide($id, $oldName, $side, $color);

        break;

        case "deleteIndex":
            // echo ($_POST['id']);
            $id = htmlentities($_POST['id']);
            $sidesController->deleteSide($id);
            break;

            case "createSide":
                // Utilities::showArray($_POST);
                $side = htmlentities(trim($_POST['side']));
                $color = htmlentities($_POST['color']);
                if (empty($side) || empty($color)) {
                    $mainController->errorPage("Tous les champs sont obligatoires !!!
                    <br><br>
                    <a href='./liste'>Retour à la liste des classes</a>
                    <br><br>
                    OU
                    ");
                    return;
                }
                $sidesController->createSide($side, $color);
                break;

    default:
        throw new Exception("La page Personnages demandée n'existe pas.");
}
