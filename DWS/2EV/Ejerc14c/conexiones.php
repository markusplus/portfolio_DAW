<?php
    function conectar() {
        $host = 'db4free.net:3306'; 
        $dbuser = 'mjovcab';
        $dbpassword = 'mjovcab012024';
        $dbname = 'discografia_mjc';
        return mysqli_connect($host, $dbuser, $dbpassword, $dbname);
    }
?>