<?php

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

function findAll() {
    $pdo_conn = getConnection();

    $sql = 'SELECT * FROM article';
    $statement = $pdo_conn->prepare($sql);
    $statement->execute();

    return $statement->fetchAll();
}

function findById($id) {
    $pdo_conn = getConnection();

    $sql = 'SELECT * FROM article  WHERE id = :id';
    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->bindValue(":id", $id);
    $pdo_statement->execute();

    return $pdo_statement->fetch();
}

function update($id, $name, $description, $created_at) {
    $pdo_conn = getConnection();

    $sql = 'UPDATE article 
            SET name = :name, 
            description = :description, 
            created_at = :created_at 
            WHERE id = :id';

    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->bindValue(':id', $id);
    $pdo_statement->bindValue(':name', $name);
    $pdo_statement->bindValue(':description', $description);
    $pdo_statement->bindValue(':created_at', $created_at);

    $result = $pdo_statement->execute();
    // print_r($result);
    return $result;
}

function deleteById($id) {
    $pdo_conn = getConnection();

    $sql = 'DELETE FROM article 
            WHERE id = :id';

    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->bindValue(':id', $id);

    $result = $pdo_statement->execute();

    return $result;
}
