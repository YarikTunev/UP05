<?php

class EquipmentMovementHistory{
    private $id;
    private $equipment_id;
    private $classroom_id;
    private $responsible_user_id;
    private $temp_responsible_user_id;
    private $movement_date;
    private $comment;

    public function __construct($params){
        if(isset($params["id"])) $this->id = $params["id"];
        $this->equipment_id = $params["equipment_id"];
        $this->classroom_id = $params["classroom_id"];
        $this->responsible_user_id = $params["responsible_user_id"];
        $this->temp_responsible_user_id = $params["temp_responsible_user_id"];
        $this->movement_date = $params["movement_date"];
        $this->comment = $params["comment"];
    }
        public function Get(){
        $connection = Connection::connect();

            $EquipmentMovementHistorys = array();

            $query = $connection->query("SELECT * FROM `EquipmentMovementHistory`");
            while($read = $query->fetch_assoc()) {
                $EquipmentMovementHistory = new EquipmentMovementHistory($read);
                array_push($EquipmentMovementHistorys, $EquipmentMovementHistory);
            }

            Connection::close($connection);

            return $EquipmentMovementHistorys;
    }
    public function Add() {
        $connection = Connection::connect();

        $query = $connection->prepare("INSERT INTO `EquipmentMovementHistory` (`equipment_id`, `classroom_id`, `responsible_user_id`, `temp_responsible_user_id`, `movement_date`, `comment`) VALUES (?, ?, ?, ?, ?, ?)");
        $query->bind_param("iiisss", $this->equipment_id, $this->classroom_id, $this->responsible_user_id, $this->temp_responsible_user_id, $this->movement_date, $this->comment);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }

    public function Update() {
        $connection = Connection::connect();

        $query = $connection->prepare("UPDATE `EquipmentMovementHistory` SET `equipment_id`=?, `classroom_id`=?, `responsible_user_id`=?, `temp_responsible_user_id`=?, `movement_date`=?, `comment`=? WHERE `id`=?");
        $query->bind_param("iiiissi", $this->equipment_id, $this->classroom_id, $this->responsible_user_id, $this->temp_responsible_user_id, $this->movement_date, $this->comment, $this->id);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }

    public function Delete() {
        $connection = Connection::connect();

        $query = $connection->prepare("DELETE FROM `EquipmentMovementHistory` WHERE `id`=?");
        $query->bind_param("i", $this->id);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }
}

?>