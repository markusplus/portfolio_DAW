<?php
    function conectar() {
        $host = 'db4free.net:3306';
        //$host1 = 'localhost';
        $dbuser = 'mjovcab';
        //$dbuser1 = 'root';
        $dbpassword = 'mjovcab012024';
        //$dbpassword1 = '';
        $dbname = 'discografia_mjc';
        //$dbname1 = 'discografia';
        return mysqli_connect($host, $dbuser, $dbpassword, $dbname);
    }
?>