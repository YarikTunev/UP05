<?php
    class NetworkSettings {
    private $id;
    private $equipment_id;
    private $ip_address;
    private $subnet_mask;
    private $gateway;
    private $dns1;
    private $dns2;

    public function __construct($params) {
        if (isset($params["id"])) $this->id = $params["id"];
        $this->equipment_id = $params['equipment_id'];
        $this->ip_address = $params['ip_address'];
        $this->subnet_mask = $params['subnet_mask'];
        $this->gateway = $params['gateway'];
        $this->dns1 = $params['dns1'];
        $this->dns2 = $params['dns2'];
    }

    public function get() {
        $connection = Connection::connect();

        $networkSettings = array();

        $query = $connection->query("SELECT * FROM `NetworkSettings`");
        while ($read = $query->fetch_assoc()) {
            $networkSetting = new NetworkSettings($read);
            array_push($networkSettings, $networkSetting);
        }

        Connection::close($connection);

        return $networkSettings;
    }

    public function add() {
        $connection = Connection::connect();

        $query = $connection->prepare("INSERT INTO `NetworkSettings` (`equipment_id`, `ip_address`, `subnet_mask`, `gateway`, `dns1`, `dns2`) VALUES (?, ?, ?, ?, ?, ?)");
        $query->bind_param("isiiii", $this->equipment_id, $this->ip_address, $this->subnet_mask, $this->gateway, $this->dns1, $this->dns2);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }

    public function update() {
        $connection = Connection::connect();

        $query = $connection->prepare("UPDATE `NetworkSettings` SET `equipment_id`=?, `ip_address`=?, `subnet_mask`=?, `gateway`=?, `dns1`=?, `dns2`=? WHERE `id`=?");
        $query->bind_param("isiiiii", $this->equipment_id, $this->ip_address, $this->subnet_mask, $this->gateway, $this->dns1, $this->dns2, $this->id);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }

    public function delete() {
        $connection = Connection::connect();

        $query = $connection->prepare("DELETE FROM `NetworkSettings` WHERE `id`=?");
        $query->bind_param("i", $this->id);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }
}
?>