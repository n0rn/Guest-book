<?php

    function db_connect()
    {
        $host =  'localhost';
        $dbname = 'book';
        $user = 'root';
        $password = '';

        $dsn = "mysql:host={$host};dbname={$dbname}";
        $db = new PDO($dsn, $user, $password);

        return $db;
    }

        $db = db_connect();
        $sql = $db->query('SELECT id, name,text  FROM  posts ORDER BY id DESC');
        $postsList = [];
        $i = 0;
        while($row = $sql->fetch()) {
            $postsList[$i]['id'] = $row ['id'];
            $postsList[$i]['name'] = $row ['name'];
            $postsList[$i]['text'] = $row ['text'];
            $i ++;
        }

    
     if(isset($_POST['submit'])) {
 
    $name = $_POST['name'];
    $text = $_POST['text'];
 
    $connect = db_connect();
    $sql = "INSERT INTO posts(name, text) VALUES (:name,:text)";
 
    $result =  $connect->prepare($sql);
    $result->bindParam(':name', $name, PDO::PARAM_STR);
    $result->bindParam(':text', $text, PDO::PARAM_STR);
    $result->execute();
 
  

   }





         

