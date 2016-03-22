<?php
class Connect {
    private $hostname;
    private $dbName;
    private $username;
    private $password;


    public function connect() {
        $filename = '../Configs/local_params.php';
        if (file_exists($filename)) :
            $db = include('../Configs/local_params.php');

         else : ?>

            <script>
            document.location.href = '../error.php?error_name=The file <?=$filename?> does not exist';
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