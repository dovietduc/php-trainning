<?php

class OneToMany 
{

    public function oneToMany($dataMain, $oneToMany, $pdo, $primaryKey) 
    {
        
        // get idGroup product
        $idGroup = [];
        foreach($dataMain as $dataMainItem) {
            $idGroup[] = $dataMainItem->$primaryKey;
        }
        $idGroup = implode(', ', $idGroup);

        list($tableRelation, $foreignKey) = array_values($oneToMany);

        $sqlRelation = "SELECT * FROM $tableRelation WHERE $foreignKey IN ($idGroup)";
        $stmt = $pdo->prepare($sqlRelation);
        $stmt->execute();
        // thuc thi sql
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $data;

    }

}