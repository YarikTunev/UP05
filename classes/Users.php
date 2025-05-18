<?php
class Users {
    private $id;
    private $login;
    private $password;
    private $role;
    private $email;
    private $last_name;
    private $first_name;
    private $middle_name;
    private $phone;
    private $address;

    public function __construct($params) {
        if (isset($params["id"])) $this->id = $params["id"];
        $this->login = $params['login'];
        $this->password = $params['password'];
        $this->role = $params['role'];
        $this->email = $params['email'];
        $this->last_name = $params['last_name'];
        $this->first_name = $params['first_name'];
        $this->middle_name = $params['middle_name'];
        $this->phone = $params['phone'];
        $this->address = $params['address'];
    }

    public function get() {
        $connection = Connection::connect();

        $users = array();

        $query = $connection->query("SELECT * FROM `Users`");
        while ($read = $query->fetch_assoc()) {
            $user = new Users($read);
            array_push($users, $user);
        }

        Connection::close($connection);

        return $users;
    }

    public function add() {
        $connection = Connection::connect();

        $query = $connection->prepare("INSERT INTO `Users` (`login`, `password`, `role`, `email`, `last_name`, `first_name`, `middle_name`, `phone`, `address`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param("ssissssss", $this->login, $this->password, $this->role, $this->email, $this->last_name, $this->first_name, $this->middle_name, $this->phone, $this->address);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }

    public function update() {
        $connection = Connection::connect();

        $query = $connection->prepare("UPDATE `Users` SET `login`=?, `password`=?, `role`=?, `email`=?, `last_name`=?, `first_name`=?, `middle_name`=?, `phone`=?, `address`=? WHERE `id`=?");
        $query->bind_param("ssissssssi", $this->login, $this->password, $this->role, $this->email, $this->last_name, $this->first_name, $this->middle_name, $this->phone, $this->address, $this->id);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }

    public function delete() {
        $connection = Connection::connect();

        $query = $connection->prepare("DELETE FROM `Users` WHERE `id`=?");
        $query->bind_param("i", $this->id);

        $result = $query->execute();
        Connection::close($connection);
        return $result;
    }
}

?>