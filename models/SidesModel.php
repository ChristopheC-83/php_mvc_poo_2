<?php 

class SidesModel extends PdoModel{
    public function getAllSides()
    {
        $req = "SELECT * from sides";
        $stmt = $this->setDB()->prepare($req);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }

}