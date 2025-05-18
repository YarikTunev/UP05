<?php
class Equipment{
    private $id;
    private $name;
    private $photo_path;
    private $inventory_number;
    private $cost;
    private $direction;
    private $status;
    private $equipment_type;
    private $model;
    private $comment;
    private $created_at;
    private $updated_at;
    private $classroom_id;

    public function __construct($params){
    if(isset($params["id"])) $this->id = $params["id"];
    $this->name=$params["name"];
    $this->photo_path=$params["photo_path"];
    $this->inventory_number=$params["inventory_number"];
    $this->cost=$params["cost"];
    $this->direction=$params["direction"];
    $this->status=$params["status"];
    $this->equipment_type=$params["equipment_type"];
    $this->model=$params["model"];
    $this->comment=$params["comment"];
    $this->created_at=$params["created_at"];
    $this->updated_at=$params["updated_at"];
    $this->classroom_id=$params["classroom_id"];
    }
    public function Get(){
        $connection = Connection::connect();

            $Equipments = array();

            $query = $connection->query("SELECT * FROM `Equepment`");
            while($read = $query->fetch_assoc()) {
                $Equipment = new Equipment($read);
                array_push($Equipments, $Equipment);
            }

            Connection::close($connection);

            return $Equipments;
    }
    public function Add() {
    $connection = Connection::connect();

    $query = $connection->prepare("INSERT INTO `Equipment` (`name`, `photo_path`, `inventory_number`, `cost`, `direction`, `status`, `equipment_type`, `model`, `comment`, `created_at`, `updated_at`, `classroom_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->bind_param("sssssssssssi", $this->name, $this->photo_path, $this->inventory_number, $this->cost, $this->direction, $this->status, $this->equipment_type, $this->model, $this->comment, $this->created_at, $this->updated_at, $this->classroom_id);

    $result = $query->execute();
    Connection::close($connection);
    return $result;
}

public function Update() {
    $connection = Connection::connect();

    $query = $connection->prepare("UPDATE `Equipment` SET `name`=?, `photo_path`=?, `inventory_number`=?, `cost`=?, `direction`=?, `status`=?, `equipment_type`=?, `model`=?, `comment`=?, `updated_at`=?, `classroom_id`=? WHERE `id`=?");
    $query->bind_param("sssssssssii", $this->name, $this->photo_path, $this->inventory_number, $this->cost, $this->direction, $this->status, $this->equipment_type, $this->model, $this->comment, $this->updated_at, $this->classroom_id, $this->id);

    $result = $query->execute();
    Connection::close($connection);
    return $result;
}

public function Delete() {
    $connection = Connection::connect();

    $query = $connection->prepare("DELETE FROM `Equipment` WHERE `id`=?");
    $query->bind_param("i", $this->id);

    $result = $query->execute();
    Connection::close($connection);
    return $result;
}
}

?>