<?php

namespace Entity;
require_once ('core/Database/PDOMySQL.php');
class Post
{

    private \PDO $pdo;

     public function __construct(){
         $this->pdo = \Database\PDOMySQL::getPdo();
     }

    public function findAll()
    {

        $request = $this->pdo->query("SELECT * FROM posts");

        $posts = $request->fetchAll();
        return $posts;
    }


    public function findById($id){
        $query= $this->pdo->prepare('SELECT * FROM posts WHERE id=:id');

        $query->execute(["id"=>$id]);

        $post = $query->fetch();
        return $post;
    }

    public function create($title,$content){
         $request= $this->pdo->prepare('INSERT INTO posts SET title = :title, content = :content');

        $request->execute([
            "title"=> $title,
            "content"=>$content
        ]);
        return $request;
    }

    public function delete($id){
        $query = $this->pdo->prepare('DELETE FROM posts WHERE id = :id') ;

        $query->execute(['id'=>$id]);
    }

}