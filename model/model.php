<?php
class Article
{
    public $dsn = 'mysql:host=127.0.0.1;dbname=CRUD';
    public $username = 'root';
    public $passwd = 'phpschool17';
    public $pdo_conn;

    function __construct() {
        $this->getConnection();
    }

    public function getConnection()
    {
        $this->pdo_conn = new PDO($this->dsn, $this->username, $this->passwd);
    }

    public function findAll()
    {
        $sql = 'SELECT * FROM article';
        $statement = $this->pdo_conn->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function insert($name, $description, $created_at)
    {
        $sql = 'INSERT INTO article (name, description, created_at) VALUES (:name, :description, :created_at)';
        $statement = $this->pdo_conn->prepare($sql);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':created_at', $created_at);

        return $statement->execute();
    }

    public function update($id, $name, $description, $created_at)
    {
        $sql = 'UPDATE article 
            SET name = :name, 
            description = :description, 
            created_at = :created_at 
            WHERE id = :id';

        $pdo_statement = $this->pdo_conn->prepare($sql);
        $pdo_statement->bindValue(':id', $id);
        $pdo_statement->bindValue(':name', $name);
        $pdo_statement->bindValue(':description', $description);
        $pdo_statement->bindValue(':created_at', $created_at);

        $result = $pdo_statement->execute();

        return $result;
    }

    public function findById($id)
    {
        $sql = 'SELECT * FROM article  WHERE id = :id';
        $pdo_statement = $this->pdo_conn->prepare($sql);
        $pdo_statement->bindValue(":id", $id);
        $pdo_statement->execute();

        return $pdo_statement->fetch();
    }

    public function deleteById($id)
    {
        $sql = 'DELETE FROM article WHERE id = :id';

        $pdo_statement = $this->pdo_conn->prepare($sql);
        $pdo_statement->bindValue(':id', $id);

        $result = $pdo_statement->execute();

        return $result;
    }

}
