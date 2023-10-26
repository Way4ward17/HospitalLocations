<?php
include_once('model/controller.php');

if(isset($_POST['del'])){
    $del = $_POST['del'];
    $table = 'hospitals';
    $query = deleteF($del, $table);
    if($query==TRUE){
        echo 'Hospital Info Deleted Successfully!';
    }else{
        echo 'Cannot delete, try again';
    }
    }
if(isset($_POST['delu'])){
    $del = $_POST['delu'];
    $table = 'users';
    $query = deleteF($del, $table);
    if($query==TRUE){
        echo 'User Deleted Successfully!';
    }else{
        echo 'Cannot delete, try again';
    }
    }

?>