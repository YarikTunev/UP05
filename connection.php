<?php
    class Connection {
        public static function connect() {

            $connection = mysqli_connect("localhost",  "root", "", "study_inv");
            if (!$connection) {
                die("Ошибка подключения: " . mysqli_connect_error());
            }
            return $connection;
        }

        public static function close($connection) {
            $connection->close();
        }
    }
?>