<?php

class SidesModel extends PdoModel
{
    public function getAllSides()
    {
        $req = "SELECT * from sides";
        $stmt = $this->setDB()->prepare($req);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }

    public function getSideByName($side)
    {
        $req = "SELECT * FROM sides WHERE side = :side";
        $stmt = $this->setDB()->prepare($req);
        $stmt->bindValue(":side", $side, PDO::PARAM_STR);
        $stmt->execute();
        $datas = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }

    public function updateSideDB($id, $side, $color)
    {
        $req = "UPDATE sides SET side = :side, color = :color WHERE id = :id";
        $stmt = $this->setDB()->prepare($req);
        $stmt->bindValue(":side", $side, PDO::PARAM_STR);
        $stmt->bindValue(":color", $color, PDO::PARAM_STR);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        return true;
    }

    public function deleteSideDB($id)
    {
        try {
            $req = "DELETE FROM sides WHERE id = :id";
            $stmt = $this->setDB()->prepare($req);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function createSideDB($side, $color, $author)
    {
        $req = "INSERT INTO sides (side, color,author ) VALUES (:side, :color, :author)";
        $stmt = $this->setDB()->prepare($req);
        $stmt->bindValue(":side", $side, PDO::PARAM_STR);
        $stmt->bindValue(":color", $color, PDO::PARAM_STR);
        $stmt->bindValue(":author", $author, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
        return true;
    }
}
