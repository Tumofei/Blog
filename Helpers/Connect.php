<?php

class Connect
{
    private $hostname;
    private $dbName;
    private $username;
    private $password;


    public function connect()
    {
        if (file_exists(__DIR__ . '/../Configs/local_params.php')) :
            $db = include(__DIR__ . '/../Configs/local_params.php');

        else : ?>

            <script>
                document.location.href = '../error.php?error_name=The file with local params does not exist';
            </script>

        <?php endif;

        $this->hostname = $db['hostname'];
        $this->username = $db['username'];
        $this->password = $db['password'];
        $this->dbName = $db['dbName'];

        $link = mysqli_connect($this->hostname, $this->username, $this->password);
        if (!$link) : ?>

            <script>
                document.location.href = '../error.php?error_name=Error autohrization database';
            </script>

        <?php endif;

        $voice = mysqli_select_db($link, $this->dbName);
        if (!$voice) : ?>

            <script>
                document.location.href = '../error.php?error_name=Error select database';
            </script>

        <?php endif;
        return $link;
    }
}