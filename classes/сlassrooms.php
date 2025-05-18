<?php 
class Classroom {
    private $id;
    private $name;
    private $short_name;
    private $responsible_user_id;
    private $temp_responsible_user_id;

    public function __construct($params) {
        if (isset($params["id"])) $this->id = $params["id"];
        $this->name = $params["name"];
        $this->short_name = $params["short_name"];
        $this->responsible_user_id = $params["responsible_user_id"];
        $this->temp_responsible_user_id = $params["temp_responsible_user_id"];
    }

    public function Get() {
        $connection = Connection::connect();

        $classrooms = array();

        $query = $connection->query("SELECT * FROM `Classrooms`");
        while ($read = $query->fetch_assoc()) {
            $classroom = new Classroom($read);
            array_push($classrooms, $classroom);
        }

        Connection::close($connection);

        return $classrooms;
    }

    public function Add() {
        $connection = Connection::connect();

        $query = $connection->prepare("INSERT INTO `Classrooms` (`name`, `short_name`, `responsible_user_id`, `temp_responsible_user_id`) VALUES (?, ?, ?, ?)");
        $query->bind_param("ssii", $this->name, $this->short_name, $this->responsible_user_id, $this->temp_responsible_user_id);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }

    public function Update() {
        $connection = Connection::connect();

        $query = $connection->prepare("UPDATE `Classrooms` SET `name`=?, `short_name`=?, `responsible_user_id`=?, `temp_responsible_user_id`=? WHERE `id`=?");
        $query->bind_param("ssiii", $this->name, $this->short_name, $this->responsible_user_id, $this->temp_responsible_user_id, $this->id);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }

    public function Delete() {
        $connection = Connection::connect();

        $query = $connection->prepare("DELETE FROM `Classrooms` WHERE `id`=?");
        $query->bind_param("i", $this->id);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }
}
?>