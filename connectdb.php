<?php
    try{
        $dbname = 'teamprotecht';
        $dbhost = '127.0.0.1';
        $username = 'root';
        $password = '';
    $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);
    }   catch(PDOException $ex){
        ?>
        <p>There was an error. Try again</p>
        <p>Error details: <?= $ex->getMessage() ?></p>
    <?php
    }
    ?>