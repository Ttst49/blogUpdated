<?php

require_once ('core/App/Response.php');
require_once ("core/Entity/Post.php");
require_once('core/Database/PDOMySQL.php');

$id = null;

if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
    $id = $_GET['id'];
}
if($id){

//trouver le post pour verifier qu'il existe
    $EntityPost = new Entity\Post();

    $post = $EntityPost->findById($id);

    if($post){

        $delete = $EntityPost->delete($id);
    }

    App\Response::redirect();

}