<?php

namespace Entity;
require_once ('core/Database/PDOMySQL.php');
class comment
{

    private \PDO $pdo;

    public function __construct(){
        $this->pdo = \Database\PDOMySQL::getPdo();
    }

    public function findAll($id)
    {

        $request = $this->pdo->prepare('SELECT * FROM comments WHERE post_id = :post_id');

        $request->execute(["post_id"=>$id]);

        $comments = $request->fetchAll();

        return $comments;
    }

    public function delete($id,$idComment)
    {

        $query = $this->pdo->prepare('SELECT * FROM comments WHERE id=:id');
        $query->execute(["id" => $id]);
        $post = $query->fetch();

        $query = $this->pdo->prepare('DELETE FROM comments WHERE id = :id') ;
        $query->execute(['id'=>$idComment]);

        return $post;
        }

}