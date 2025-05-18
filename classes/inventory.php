<?php
class Inventory {
    private $id;
    private $name;
    private $start_date;
    private $end_date;
    private $created_by;

    public function __construct($params) {
        if (isset($params["id"])) $this->id = $params["id"];
        $this->name = $params['name'];
        $this->start_date = $params['start_date'];
        $this->end_date = $params['end_date'];
        $this->created_by = $params['created_by'];
    }

    public function get() {
        $connection = Connection::connect();

        $inventories = array();

        $query = $connection->query("SELECT * FROM `Inventory`");
        while ($read = $query->fetch_assoc()) {
            $inventory = new Inventory($read);
            array_push($inventories, $inventory);
        }

        Connection::close($connection);

        return $inventories;
    }

    public function add() {
        $connection = Connection::connect();

        $query = $connection->prepare("INSERT INTO `Inventory` (`name`, `start_date`, `end_date`, `created_by`) VALUES (?, ?, ?, ?)");
        $query->bind_param("sssi", $this->name, $this->start_date, $this->end_date, $this->created_by);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }

    public function update() {
        $connection = Connection::connect();

        $query = $connection->prepare("UPDATE `Inventory` SET `name`=?, `start_date`=?, `end_date`=?, `created_by`=? WHERE `id`=?");
        $query->bind_param("sssii", $this->name, $this->start_date, $this->end_date, $this->created_by, $this->id);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }

    public function delete() {
        $connection = Connection::connect();

        $query = $connection->prepare("DELETE FROM `Inventory` WHERE `id`=?");
        $query->bind_param("i", $this->id);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }
}
?>