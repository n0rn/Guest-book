<?php

require_once 'function.php';

//User input

 $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
 $perPage = isset($_GET['per-page']) && $_GET['per-page'] <=50 ? (int)$_GET['per-page'] : 5;


//Positioning

 $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;




 //Query

$connect= db_connect();
$articles = $connect->prepare("
    SELECT SQL_CALC_FOUND_ROWS id, name, text
    FROM posts
    LIMIT {$start}, {$perPage}
    ");

$articles->execute();

$articles = $articles->fetchALL(PDO::FETCH_ASSOC);

//Pages

$total = $connect->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
echo $pages = ceil($total / $perPage);