<?php
class InventoryResults {
    private $id;
    private $inventory_id;
    private $equipment_id;
    private $checked_by;
    private $comment;
    private $status;

    public function __construct($params) {
        if (isset($params["id"])) $this->id = $params["id"];
        $this->inventory_id = $params['inventory_id'];
        $this->equipment_id = $params['equipment_id'];
        $this->checked_by = $params['checked_by'];
        $this->comment = $params['comment'];
        $this->status = $params['status'];
    }

    public function get() {
        $connection = Connection::connect();

        $inventoryResults = array();

        $query = $connection->query("SELECT * FROM `InventoryResults`");
        while ($read = $query->fetch_assoc()) {
            $inventoryResult = new InventoryResults($read);
            array_push($inventoryResults, $inventoryResult);
        }

        Connection::close($connection);

        return $inventoryResults;
    }

    public function add() {
        $connection = Connection::connect();

        $query = $connection->prepare("INSERT INTO `InventoryResults` (`inventory_id`, `equipment_id`, `checked_by`, `status`, `comment`) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param("iiiss", $this->inventory_id, $this->equipment_id, $this->checked_by, $this->status, $this->comment);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }

    public function update() {
        $connection = Connection::connect();

        $query = $connection->prepare("UPDATE `InventoryResults` SET `inventory_id`=?, `equipment_id`=?, `checked_by`=?, `status`=?, `comment`=? WHERE `id`=?");
        $query->bind_param("iiissi", $this->inventory_id, $this->equipment_id, $this->checked_by, $this->status, $this->comment, $this->id);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }

    public function delete() {
        $connection = Connection::connect();

        $query = $connection->prepare("DELETE FROM `InventoryResults` WHERE `id`=?");
        $query->bind_param("i", $this->id);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }
}
?>