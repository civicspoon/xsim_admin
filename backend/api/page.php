<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../config/database.php';
    include_once '../class/page.php';

    $database = new Database();
    $db = $database->getConnection();
    $page = new Page($db);

    $page->pageid = isset($_GET['id']) ? $_GET['id'] : die();
    $page->getpage();

    if($page->pagetitle != null){
        
    }