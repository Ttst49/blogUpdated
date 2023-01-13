<?php

require_once ('core/Entity/Comment.php');
require_once ('core/App/Response.php');

$id = null;
$idComment =null;

if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
    $id = $_GET['id'];
}
if(!empty($_GET['idComment']) && ctype_digit($_GET['idComment']) ){
    $idComment = $_GET['idComment'];
}
if($idComment){



    $commentEntity= new Entity\comment();

    $comment= $commentEntity->delete($id,$idComment);


}
App\Response::redirect("post.php?id=$id");