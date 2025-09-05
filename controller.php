<?php 
    require_once 'model.php';
    $tache = new TachesDB();
    if(isset($_GET['action']) == true) {
        $action = $_GET['action'];
        if($action == 'create'){
            $nom = $_POST['tache'];
            $tache->create($nom);
            header('Location:index.php');
        }
        if($action == 'delete'){
            $id = $_GET['id'];
            $tache->delete($id);
            header('Location:index.php');
        }
         if($action == 'read'){
            header("Content-Type: application/json; charset=UTF-8");
            $id = $_GET['id'];
            $data = $tache->readOne($id);
            echo json_encode($data);  
        }
        if($action == 'update'){
            $id = $_GET['id'];
            $nom = $_POST['newTache'];
            $tache->update($id,$nom);
            header('Location:index.php');
        }   
        if($action == 'deleteAll'){
            $tache->deleteAll();
            header('Location:index.php');
        }   
    }