<?php
class Connect {
    private $hostname;
    private $dbName;
    private $username;
    private $password;


    public function connect() {
        $filename = 'local_params.php';
        if (file_exists($filename)) {
            $db = include('local_params.php');

        } else {
            die ("The file $filename does not exist");
        }
        $this->hostname = $db['hostname'];
        $this->username = $db['username'];
        $this->password = $db['password'];
        $this->dbName = $db['dbName'];

        $link = mysqli_connect($this->hostname, $this->username, $this->password);
        if (!$link) {
            die('Error connect: ' . mysqli_error($link));
        }

        $voice = mysqli_select_db($link, $this->dbName);
        if (!$voice) {
            die('Error select database : ' . mysqli_error($link));
        }
        return $link;
    }
}
//testtestest

?>