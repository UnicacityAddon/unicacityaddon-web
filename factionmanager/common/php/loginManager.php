<?php
class loginManager {

    function getConnection() {
        $connection = mysqli_connect(config::$MYSQL_HOST, config::$MYSQL_USER, config::$MYSQL_PASSWORD, config::$MYSQL_DATABASE)
        or die(mysqli_error());

        return $connection;
    }

    private function getQuery($sql) {
        $query = mysqli_query($this->getConnection(), $sql);
        return $query;
    }

    function numRows($sql) {
        /**if (null !== $this->getQuery($sql)) {
            return 0;
            $_SESSION['lalala'] = "HUSN";
        }
        if (strcmp($this->fetchAssoc($this->getQuery($sql)),"false")) {
            return 0;
            $_SESSION['lalala'] = "HS";
        }**/
        $rows = mysqli_num_rows($this->getQuery($sql));
        return $rows;
    }

    function fetchAssoc($sql, $value) {
        $fetch = mysqli_fetch_assoc($this->getQuery($sql));

        return $fetch[$value];
    }

    function loginPost($uuid, $password) {
        if ($this->numMembers() < 1) {
            $_SESSION['membersum'] = $this->numMembers();
            
            $this->createUser($uuid, $password, 6);
            $_SESSION['logged'] = true;
            $_SESSION['uuid'] = $uuid;
            $_SESSION['rank'] = 6;
            header('Location: /index?login=true');
        } else if ($this->checkLogin($uuid, $password) > 0) {
            $_SESSION['logged'] = true;
            $_SESSION['uuid'] = $uuid;
            $_SESSION['rank'] = $this->getRank($uuid);
            header('Location: /index?login=true');
        } else {
            header('Location: /login?errorlogin=true');
        }

    }

    function getRank($uuid) {
        $fetch = $this->fetchAssoc("SELECT * FROM memberlist WHERE uuid='$uuid'", "rank");
        return $fetch;
    }

    function checkLogin($uuid, $password) {
        $checkuuid = $this->getConnection() -> real_escape_string($uuid);
        $checkPassword = $this->getConnection() -> real_escape_string($password);

        $num = $this->numRows("SELECT * FROM memberlist WHERE uuid='". htmlspecialchars($checkuuid) ."' AND password='". htmlspecialchars(md5($checkPassword)) ."'");
        return $num;
    }

    function createUser($uuid, $password, $rank) {
        $this->getQuery("INSERT INTO memberlist (`uuid`,
                                            `rank`,
                                            `password`)
                                             VALUES ('". htmlspecialchars($uuid) ."',
                                             '". $rank ."',
                                            '". md5($password) ."');");
    }

    function numMembers() {
        $num = $this->numRows("SELECT * FROM memberlist");
        return $num;
    }

    function checkUserExist($username) {
        $checkUsername = $this->getConnection() -> real_escape_string($username);

        $num = $this->numRows("SELECT * FROM memberlist WHERE username='". htmlspecialchars($checkUsername) ."'");
        return $num;
    }

    function resetPassword($uuid,$password) {
        $this->getQuery("UPDATE memberlist SET password=" . md5($password) . " WHERE uuid='". $uuid ."'"); //1234 Hash to entry
    }

} ?>