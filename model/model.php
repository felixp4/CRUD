<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 30.04.17
 * Time: 13:04
 */

function getConnection() {
    $pdo_conn = new PDO("mysql:host=127.0.0.1;dbname=CRUD", 'root', 'phpschool17');

    return $pdo_conn;
}

function insert($name, $description, $created_at) {
    $pdo_conn = getConnection();

    $sql = 'INSERT INTO article (name, description, created_at) VALUES (:name, :description, :created_at)';
    $statement = $pdo_conn->prepare($sql);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':created_at', $created_at);

    return $statement->execute();
}