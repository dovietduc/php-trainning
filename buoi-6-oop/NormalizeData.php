<?php

class NormalizeData {

    public function normalData($dataRelation, $dataMain, $oneToMany) 
    {
        $dataRelationGroup = [];

        list($tableRelation, $foreignKey) = array_values(reset($oneToMany));

        foreach($dataRelation as $dataRelationItem) {
            $dataRelationGroup[$dataRelationItem->$foreignKey][] = $dataRelationItem;
        }

        foreach($dataMain as $dataMainItem) {
            $dataMainItem->$tableRelation = $dataRelationGroup[$dataMainItem->id];
        }

        return $dataMain;


    }

}