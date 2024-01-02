<?php
    function conectar() {
        $host = 'db4free.net:3306'; 
        $dbuser = 'mjovcab';
        $dbpassword = 'SesCagat@123';
        $dbname = 'discografia_mjc';
        return mysqli_connect($host, $dbuser, $dbpassword, $dbname);
    }
?>